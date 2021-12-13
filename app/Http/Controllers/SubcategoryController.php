<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', [
            'subcategories' => $subcategories
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', [
            'categories' => $categories
        ]);
    }
    public function store(Request $request)
    {
        // print_r($request->all());
        $this->validate($request, [
            'subcategory_name' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Subcategory::create([
            'subcategory_name' => $request->input('subcategory_name'),
            'category_id' => $request->input('category_id'),
            'subcat_image' => $newImage
        ]);
        return redirect('/subcategory')->with('success, Data added Successfully');
    }
    public function show($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return view('admin.subcategory.show', [
            'subcategory' => $subcategory
        ]);
    }
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::where('id', '!=', $subcategory->category_id)->get();
        return view('admin.subcategory.edit', [
            'subcategory' => $subcategory,
            'categories' => $categories
        ]);
    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        unlink(base_path('public/storage/images/' . $subcategory->subcat_image));
        $this->validate($request, [
            'subcategory_name' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Subcategory::where('id', $id)
            ->update([
                'subcategory_name' => $request->input('subcategory_name'),
                'category_id' => $request->input('category_id'),
                'subcat_image' => $newImage
            ]);
        return redirect('/subcategory')->with('success, Data Updated Successfully');
    }
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        unlink(base_path('public/storage/images/' . $subcategory->subcat_image));
        $subcategory->delete();
        return redirect('/subcategory')->with('success, Data Deleted Successfully');
    }
}
