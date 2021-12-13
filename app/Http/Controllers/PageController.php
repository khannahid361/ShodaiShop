<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showSlider()
    {
        // $counts = Slider::count();
        $sliders = Slider::all();
        return view('customer.index', [
            'sliders' => $sliders
        ]);
    }
}
