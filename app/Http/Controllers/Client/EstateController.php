<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Location;
use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class EstateController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:100',
            'types' => 'nullable|array|min:0',
            'types.*' => 'nullable|integer|min:1',
            'locations' => 'nullable|array|min:0',
            'locations.*' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|in:15,30,60,120',
        ]);



        $search = $request->q ?: null;
        $f_types = $request->has('types') ? $request->types : [];
        $f_locations = $request->has('locations') ? $request->locations : [];
        $f_sort = $request->has('sort') ? $request->sort : null;
        $f_page = $request->has('page') ? $request->page : 1;
        $f_perPage = $request->has('perPage') ? $request->perPage : 15;

        $estates = Estate::when($f_types, function ($query) use ($f_types) {
            $query->whereIn('type_id', $f_types);
        })
            ->
            when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('name', 'ilike', '%' . $search . '%');
                });
            })
            ->when($f_locations, function ($query) use ($f_locations) {
                $query->whereIn('location_id', $f_locations);
            })

            ->with('type', 'location')
            ->when(isset($f_sort), function ($query) use ($f_sort) {
                if ($f_sort == 'old-to-new') {
                    $query->orderBy('id');
                } else {
                    $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate($f_perPage, ['*'], 'page', $f_page)
            ->withQueryString();

        $types = Type::orderBy('name_tm')
            ->get();
        $locations = Location::orderBy('name_tm')
            ->get();

        return view('car.index')
            ->with([
                'estates' => $estates,
                'types' => $types,
                'locations' => $locations,
                'f_types' => $f_types,
                'f_locations' => $f_locations,
                'f_perPage' => $f_perPage,
            ]);
    }


    public function show($id)
    {
        $estate = Estate::with('user', 'type', 'location')
            ->findOrFail($id);

        $similar2 = Estate::where('id', '!=', $id)
            ->with('type', 'location')
            ->take(4)
            ->get();

        $similar = Estate::where('type_id', $estate->type->id)
            ->where('location_id', $estate->location->id)
            ->where('id', '!=', $id)
            ->with('type', 'location')
            ->take(4)
            ->get();


        return view('car.show')
            ->with([
                'estate' => $estate,
                'similar' => $similar,
                'similar2' => $similar2,
            ]);
    }


    public function favorite($id)
    {
        $estate = Estate::where('id', $id)
            ->firstOrFail();

        if (Cookie::has('store_favorites')) {
            $cookies = explode(",", Cookie::get('store_favorites'));
            if (in_array($estate->id, $cookies)) {
                $estate->decrement('favorited');
                $index = array_search($estate->id, $cookies);
                unset($cookies[$index]);
            } else {
                $estate->increment('favorited');
                $cookies[] = $estate->id;
            }
            Cookie::queue('store_favorites', implode(",", $cookies), 60 * 24);
        } else {
            $estate->increment('favorited');
            Cookie::queue('store_favorites', $estate->id, 60 * 24);
        }

        return redirect()->back();
    }



    public function create()
    {
        $types = Type::orderBy('id')
            ->get();
        $locations = Location::orderBy('id')
            ->get();

        return view('car.create', [
            'types' => $types,
            'locations' => $locations,
        ]);
    }


    public function store(Request $request)
    {
        $request->validatedData = $request -> validate ([
            'type_id' => 'required|max:255',
            'location_id' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        // name
        $user = Auth::user()->id;
        $type = Type::findOrFail($request->type_id);
        $location = Location::findOrFail($request->location_id);
        $name = $type->name_tm . ' ' . $request->name_tm;

        // kitap
        $estate = new Estate();
        $estate->user_id = $user;
        $estate->type_id = $type->id;
        $estate->location_id = $location->id;
        $estate->name = $name;
        $estate->description = $request->description ?: null;
        $estate->price = $request->price;

        // image
        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = $estate->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/estates/', $newImageName);
            $estate->image = $newImageName;
        }

        $estate->save();

        $success = trans('app.store-response', ['name' => $estate->name]);
        return redirect()->route('estates.show', $estate->id)
            ->with([
                'success' => $success,
            ]);
    }


    public function edit($id)
    {
        $estate = Estate::where('id', $id)
            ->firstOrFail();
        $types = Type::orderBy('id')
            ->get();
        $locations = Location::orderBy('id')
            ->get();

        return view('car.edit', [
            'estate' => $estate,
            'types' => $types,
            'locations' => $locations,
        ]);
    }

    public function update(Request $request, $id)
    {
        $estate = Estate::findOrFail($id);

        $request->validate([
            'type_id' => 'required|exists:types,id',
            'location_id' => 'required|exists:locations,id',
            'description' => 'nullable|string|max:2550',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);
        $user = Auth::user()->id;

        $estate->user_id = $user;
        $estate->type_id = $request->type_id;
        $estate->location_id = $request->location_id;
        $estate->name = $request->name;
        $estate->description = $request->description;
        $estate->price = $request->price;

        // image
        if ($request->hasFile('image')) {
            if ($estate->image) {
                Storage::delete('public/estates/' . $estate->image);
            }
            $newImage = $request->file('image');
            $newImageName = $estate->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/estates/', $newImageName);
            $estate->image = $newImageName;
        }

        $estate->save();

        $success = trans('app.update-response', ['name' => $estate->name]);
        return redirect()->route('estates.show', $estate->id)
            ->with(['success' => $success]);
    }


    public function delete($id)
    {
        $estate = Estate::where('id', $id)
            ->firstOrFail();
        $success = trans('app.delete-response', ['name' => $estate->name]);
        $estate->delete();

        return redirect()->route('home')
            ->with([
                'success' => $success,
            ]);
    }

    public function userCars()
    {
        $estates = Estate::where('user_id', auth()->user()->id)
            ->with(['type', 'location'])
            ->get();

        return view('car.userCars', [
            'estates' => $estates,
        ]);
    }
}
