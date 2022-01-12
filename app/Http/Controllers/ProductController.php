<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', [
            'products' => $products
        ]);
    }
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
    public function getSubcategory($id)
    {
        $subcategory = Subcategory::where("category_id", $id)->pluck("subcategory_name", "id");
        return json_encode($subcategory);
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'product_name' => 'required',
        //     'opening_stock' => 'required',
        //     'details' => 'required',
        //     'description' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        //     'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        // ]);

        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'opening_stock' => $request->input('opening_stock'),
            'cost' => $request->input('cost'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'subcategory_id' => $request->input('subcategory'),
            'brand_id' => $request->input('brand'),
            'description' => $request->input('description'),
            'image_path' => $newImage
        ]);
        $productId = $product->id;
        $sl  = 0;
        foreach ($request->file('image_path') as $image) {
            // $file = $image('image_path');
            $filename = date('Ymdmhs') . $sl . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('public/storage/images'), $filename);
            ProductImage::create([
                'product_id' => $productId,
                'img_path' => $filename
            ]);
            $sl++;
        }

        return redirect('/product')->with('success', 'Data Added Successfully');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->first();
        unlink(base_path('public/storage/images/' . $product->image_path));
        foreach ($product->productImages as $images) {
            unlink(base_path('public/storage/images/' . $images->img_path));
        }
        $product->delete();
        return redirect('/product')->with('success', 'Data deleted Successfully');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id)->first();
        return view('admin.product.show', [
            'product' => $product
        ]);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        unlink(base_path('public/storage/images/' . $product->image_path));
        $productImages = ProductImage::where('product_id', $id)->get();
        foreach ($productImages as $images) {
            unlink(base_path('public/storage/images/' . $images->img_path));
            $images->delete();
        }
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Product::where('id', $id)
            ->update([
                'product_name' => $request->input('product_name'),
                'opening_stock' => $request->input('opening_stock'),
                'cost' => $request->input('cost'),
                'price' => $request->input('price'),
                'details' => $request->input('details'),
                'subcategory_id' => $request->input('subcategory'),
                'brand_id' => $request->input('brand'),
                'description' => $request->input('description'),
                'image_path' => $newImage
            ]);
        $sl  = 0;

        foreach ($request->file('image_path') as $image) {
            $filename = date('Ymdmhs') . $sl . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('public/storage/images'), $filename);
            ProductImage::create([
                'product_id' => $id,
                'img_path' => $filename
            ]);
            $sl++;
        }

        return redirect('/product')->with('success', 'Data Added Successfully');
    }
    public function customerIndex()
    {
        $products = Product::with('stocks')->get();
        return view('customer.index', [
            'products' => $products
        ]);
    }
}
