<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Estate;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class TypesController extends Controller
{
    public function index()
    {
        $objs = Type::get();

        return view('admin.type.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.type.create');
    }


    public function store(Request $request)
    {
        $request->validatedData = $request -> validate ([
            'name' => 'required|max:255'
        ]);

        // book
        $estate = new Type();
        $estate->name = $request->name;
        $estate->save();

        $success = trans('app.store-response', ['name' => $estate->name]);
        return redirect('/admin/types')
            ->with([
                'success' => $success,
            ]);
    }


    public function edit($id)
    {
        $obj = Type::find($id)->first();

        return view('admin.type.edit', ['obj' => $obj]);
    }

    public function update(Request $request, $id)
    {
        $estate = Type::find($id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $estate->name = $request->name;
        $estate->save();

        $success = trans('app.update-response', ['name' => $estate->name]);
        return redirect('/admin/types')
            ->with(['success' => $success]);
    }


    public function destroy($id)
    {
        $estate = Type::where('id', $id)
            ->firstOrFail();
        $success = trans('app.delete-response', ['name' => $estate->name]);
        $estate->delete();

        return redirect('/admin/types')
            ->with([
                'success' => $success,
            ]);
    }

}
