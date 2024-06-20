<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }

    public function language($key)
    {
        if ($key == 'en') {
            session()->put('locale', 'en');
        } elseif ($key == 'ru')  {
            session()->put('locale', 'ru');
        } else {
            session()->put('locale', 'tk');
        }
        return redirect()->back();
    }
}
