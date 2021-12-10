<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        // print_r($request->all());
        $this->validate($request, [
            'category_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Category::create([
            'category_name' => $request->input('category_name'),
            'cat_image' => $newImage
        ]);
        return redirect('/category')->with('success, Data added Successfully');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', [
            'category' => $category
        ]);
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        unlink(base_path('public/storage/images/' . $category->cat_image));
        $this->validate($request, [
            'category_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Category::where('id', $id)
            ->update([
                'category_name' => $request->input('category_name'),
                'cat_image' => $newImage
            ]);
        return redirect('/category')->with('success, Data Updated Successfully');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        unlink(base_path('public/storage/images/' . $category->cat_image));
        $category->delete();
        return redirect('/category')->with('success, Data Deleted Successfully');
    }
}
