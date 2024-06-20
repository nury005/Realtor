<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return view('client.home.index.popular');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:32',
            'email' => 'required|string',
            'company' => 'nullable|string',
            'text' => 'required|string|max:500',]);
        $message = new Note();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->company = $request->company;
        $message->text = $request->text;
        $message->save();

        toastr()->success(trans('app.send-response'), trans('app.success'), ['timeOut' => 3000]);

        return redirect()->back();
    }
}