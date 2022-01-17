<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReturnController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $returns = ProductReturn::where('user_id', $user)->with('order')->get();
        // dd($returns);
        return view('return.index', [
            'returns' => $returns
        ]);
    }
    public function returnForm($orderId)
    {
        $order = Order::findOrFail($orderId);
        $check = [0];
        foreach ($order->cartItems as $cart) {
            if (ProductReturn::where([
                ['order_id', '=', $orderId],
                ['product_id', '=', $cart->product_id]
            ])->first()) {
                $check[0] = 1;
            } else {
                $check[0] = 0;
            }
        }
        return view('return.create', [
            'order' => $order,
            'check' => $check
        ]);
    }
    public function storeReturn(Request $request, $orderId)
    {
        // dd($request->all());
        $user = Auth::user()->id;
        $amount = $request->input('return') * $request->input('rate');
        ProductReturn::create([
            'order_id' => $orderId,
            'user_id' => $user,
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('return'),
            'rate' => $request->input('rate'),
            'amount' => $amount,
            'status' => 0
        ]);
        return redirect()->back()->with('success', 'Applied For Return/Refund');
    }
    public function getReturn()
    {
        $returns = ProductReturn::with('order')->get();
        // dd($returns);
        return view('admin.return', [
            'returns' => $returns
        ]);
    }
    public function update(Request $request, $returnId)
    {
        ProductReturn::where('id', $returnId)
            ->update([
                'status' => $request->input('status')
            ]);
        return redirect()->back()->with('success', 'Update Successfull');
    }
}
