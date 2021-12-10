<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', [
            'brands' => $brands
        ]);
    }
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.show', [
            'brand' => $brand
        ]);
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        unlink(base_path('public/storage/images/' . $brand->brand_image));
        $this->validate($request, [
            'brand_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Brand::where('id', $id)
            ->update([
                'brand_name' => $request->input('brand_name'),
                'brand_image' => $newImage
            ]);
        return redirect('/brand')->with('success, Data Updated Successfully');
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Brand::create([
            'brand_name' => $request->input('brand_name'),
            'brand_image' => $newImage
        ]);
        return redirect('/brand')->with('success', "New record added");
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        unlink(base_path('public/storage/images/' . $brand->brand_image));
        $brand->delete();
        return redirect('/brand')->with('success, Data Deleted Successfully');
    }
}
