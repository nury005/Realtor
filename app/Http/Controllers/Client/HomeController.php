<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Estate;
use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::get();

        $types = Type::withCount('estates')
            ->orderBy('name_tm')
            ->take(5)
            ->get();

        $typeEstates = [];
        foreach ($types as $type) {
            $typeEstates[] = [
                'type' => $type,
                'estates' => Estate::where('type_id', $type->id)
                    ->with('type', 'location')
                    ->take(4)
                    ->get(),
            ];
        }

//        $credit = Car::where('credit', 1)
//            ->with(['brand'])
//            ->inRandomOrder()
//            ->take(6)
//            ->get([
//                'id', 'brand_id', 'name', 'image', 'price', 'credit',
//            ]);
//
//        $change = Car::where('change', 1)
//            ->with(['brand'])
//            ->inRandomOrder()
//            ->take(6)
//            ->get([
//                'id', 'brand_id', 'name', 'image', 'price', 'credit',
//            ]);

        return view('home.index')
            ->with([
                'sliders' => $sliders,
                'typeEstates' => $typeEstates,
//                'change' => $change,
//                'credit' => $credit,
            ]);
    }


    public function locale($locale)
    {
        if ($locale == 'en') {
            session()->put('locale', 'en');
            return redirect()->back();
        }

        elseif ($locale == 'tm') {
            session()->put('locale', 'tm');
            return redirect()->back();
        }

        elseif ($locale == 'ru') {
            session()->put('locale', 'ru');
            return redirect()->back();
        }


        elseif ($locale == 'tr') {
            session()->put('locale', 'tr');
            return redirect()->back();
        }

        else {
            return redirect()->back();
        }
    }
}

