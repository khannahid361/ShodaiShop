<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::with('stocks')->get();
        foreach ($products as $product) {
            $product->qty = $product->opening_stock;
            foreach ($product->stocks as $stock) {
                $product->qty += $stock->stock;
            }
        }
        return view('admin.stock.index', compact('products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.stock.create', [
            'products' => $products
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'stock' => 'required|min:1'
        ]);
        Stock::create([
            'product_id' => $request->input('product_id'),
            'stock' => $request->input('stock')
        ]);
        return redirect('/stock')->with('Success', 'Data added successfully');
    }
    public function details($id)
    {
        $product = Product::findOrFail($id);
        $stocks = Stock::where('product_id', $id)->get();
        return view('admin.stock.details', [
            'product' => $product,
            'stocks' => $stocks
        ]);
    }
    public function destroy($id, $stockId)
    {
        $stock = Stock::findOrFail($stockId);
        $stock->delete();
        return redirect('/stock/' . $id)->with('Success', 'Data Deleted Successfully');
    }
    public function edit($id, $stockId)
    {
        $stock = Stock::findOrFail($stockId);
        return view('admin.stock.edit', [
            'stock' => $stock
        ]);
    }
    public function update(Request $request, $id, $stockId)
    {
        $request->validate([
            'stock' => 'required'
        ]);
        Stock::where('id', $stockId)
            ->update([
                'stock' => $request->input('stock')
            ]);
        return redirect('/stock/' . $id)->with('Success', 'Data Updated Successfully');
    }
}
