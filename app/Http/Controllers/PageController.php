<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showAll()
    {
        // $counts = Slider::count();
        $sliders = Slider::all();
        $products = Product::with('stocks')->get();
        return view('customer.index', [
            'sliders' => $sliders,
            'products' => $products
        ]);
    }
    public function productDescription($productId)
    {

        $product = Product::findOrFail($productId);
        $product->qty = $product->opening_stock;
        foreach ($product->stocks as $stock) {
            $product->qty += $stock->stock;
        }
        // dd($product);
        return view('customer.product', [
            'product' => $product
        ]);
    }
}
