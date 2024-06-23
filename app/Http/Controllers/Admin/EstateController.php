<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
            'sort' => 'nullable|string|in:top-to-bottom,bottom-to-top,by-alphabet,start-to-end,end-to-start',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|in:10,25,50,100',
        ]);

        $q = $request->q ?: null;
        $f_sort = $request->has('sort') ? $request->sort : null;
        $f_page = $request->has('page') ? $request->page : 1;
        $f_perPage = $request->has('perPage') ? $request->perPage : 10;

        $objs = Estate::when($q, function ($query, $q) {
    return $query->where(function ($query) use ($q) {
        $query->orWhere('name', 'like', '%' . $q . '%');
        $query->orWhere('type_id', 'like', '%' . $q . '%');
        $query->orWhere('location_id', 'like', '%' . $q . '%');
        $query->orWhere('price', 'like', '%' . $q . '%');
//        $query->orWhere('phone', 'like', '%' . $q . '%');
    });
})
            ->when(isset($f_sort), function ($query) use ($f_sort) {
                if ($f_sort == 'by-alphabet') {
//                    $query->orderBy('secondName');
                } elseif ($f_sort == 'bottom-to-top') {
$query->orderBy('id', 'desc');
} elseif ($f_sort == 'top-to-bottom') {
$query->orderBy('id');
} elseif ($f_sort == 'start-to-end') {
$query->orderBy('birthday');
} elseif ($f_sort == 'end-to-start') {
$query->orderBy('birthday', 'desc');
}
//else {
//    $query->orderBy('secondName');
//}
})

->paginate($f_perPage, ['*'], 'page', $f_page)
    ->withQueryString();

return view('admin.citizen.index')
    ->with([
        'q' => $q,
        'objs' => $objs,
        'f_sort' => $f_sort,
        'f_perPage' => $f_perPage,
    ]);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.citizen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:16'],
        'type_id' => ['required', 'string', 'max:16'],
        'location_id' => ['required', 'string', 'max:16'],
        'description' => ['required', 'string', 'max:11'],
        'price' => ['required', 'integer', 'min:0', 'max:99999'],
        'image' => ['nullable', 'max:1000000', 'mimes:jpeg,jpg,png'],
    ]);

    $obj = Estate::create([
        'name' => $request->name,
        'type_id' => $request->type_id,
        'location_id' => $request->location_id,
        'description' => $request->description,
        'price' => $request->price,
//        'gender' => $request->gender,
//        'country' => $request->country,
//        'phone' => $request->phone,
    ]);

    if ($request->hasFile('image')) {
        $name = str()->random(10) . '.' . $request->image->extension();
        Storage::putFileAs('public/img', $request->image, $name);
        $obj->image = $name;
        $obj->update();
    }

    return to_route('admin.estates.index')
        ->with([
            'success' => trans('app.estate') . ' (' . $obj->name . ') ' . trans('app.added') . '!'
        ]);
}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $obj = Estate::findOrFail($id);
//        $notes = Note::with(['estate'])
//            ->paginate(20)
//            ->withQueryString();

        return view('admin.citizen.show')
            ->with([
                'obj' => $obj,
//                'notes' => $notes,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $obj = Estate::findOrFail($id);

        return view('admin.citizen.edit')
            ->with([
                'obj' => $obj,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:16'],
        'type' => ['required', 'string', 'max:16'],
        'location_id' => ['required', 'string', 'max:16'],
        'description_id' => ['required', 'string', 'max:11'],
        'price' => ['required', 'integer', 'min:0', 'max:99999'],
//        'phone' => ['required', 'integer', 'min:61000000', 'max:71999999'],
        'image' => ['nullable', 'max:1000000', 'mimes:jpeg,jpg,png'],
    ]);

    $obj = Estate::updateOrCreate([
        'id' => $id,
    ], [
        'name' => $request->name,
        'type_id' => $request->type_id,
        'location_id' => $request->location_id,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    if ($request->hasFile('image')) {
        if ($obj->image) {
            Storage::delete('public/img' . $obj->image);
        }
        $name = str()->random(10) . '.' . $request->image->extension();
        Storage::putFileAs('public/img', $request->image, $name);
        $obj->image = $name;
        $obj->update();
    }


    return to_route('admin.estates.index')
        ->with([
            'success' => trans('app.estate') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
        ]);

}

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
{

    $obj = Estate::findOrFail($id);
    $objName = $obj->name;
    $obj->delete();

    return redirect()->back()
        ->with([
            'success' => trans('app.estate') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
        ]);
}
}
