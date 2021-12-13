<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', [
            'sliders' => $sliders
        ]);
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Slider::create([
            'title' => $request->input('title'),
            'slider_image' => $newImage
        ]);
        return redirect('/slider')->with('success', 'Data added Successfully');
    }
    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.show', [
            'slider' => $slider
        ]);
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', [
            'slider' => $slider
        ]);
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        unlink(base_path('public/storage/images/' . $slider->slider_image));
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Slider::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'slider_image' => $newImage
            ]);
        return redirect('/slider')->with('success', 'Data added Successfully');
    }
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        unlink(base_path('public/storage/images/' . $slider->slider_image));
        $slider->delete();
        return redirect('/slider')->with('success', 'Data Deleted Successfully');
    }
}
