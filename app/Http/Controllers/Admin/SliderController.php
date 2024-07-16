<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $objs = Slider::get();

        return view('admin.slider.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:16'],
            'image' => ['nullable', 'max:1000000', 'mimes:jpeg,jpg,png'],
        ]);

        $obj = Slider::create([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $name = str()->random(10) . '.' . $request->image->extension();
            Storage::putFileAs('public/slider', $request->image, $name);
            $obj->image = $name;
            $obj->update();
        }

        return to_route('admin.sliders.index')
            ->with([
                'success' => trans('app.slider') . ' (' . $obj->name . ') ' . trans('app.added') . '!'
            ]);
    }

    public function show($id)
    {
        $obj = Slider::findOrFail($id);

        return view('admin.slider.show')
            ->with([
                'obj' => $obj,
            ]);
    }

    public function edit($id)
    {
        $obj = Slider::findOrFail($id);

        return view('admin.slider.edit')
            ->with([
                'obj' => $obj,
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:16'],
            'image' => ['nullable', 'max:1000000', 'mimes:jpeg,jpg,png'],
        ]);

        $obj = Slider::updateOrCreate([
            'id' => $id,
        ], [
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            if ($obj->image) {
                Storage::delete('public/slider/' . $obj->image);
            }
            $name = str()->random(10) . '.' . $request->image->extension();
            Storage::putFileAs('public/slider', $request->image, $name);
            $obj->image = $name;
            $obj->update();
        }


        return to_route('admin.sliders.index')
            ->with([
                'success' => trans('app.slider') . ' (' . $obj->name . ') ' . trans('app.updated') . '!'
            ]);

    }

    public function destroy($id)
    {
        $obj = Slider::findOrFail($id);
        $objName = $obj->name;
        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.slider') . ' (' . $objName . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
