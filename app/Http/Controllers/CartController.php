<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        // dd(session('cartItems'));
        return view('cart.cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cartItems = session()->get('cartItems', []);
        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        } else {
            $cartItems[$id] = [
                'image_path' => $product->image_path,
                'name' => $product->product_name,
                'details' => $product->details,
                'price' => $product->price,
                'quantity' => 1
            ];
        }
        session()->put('cartItems', $cartItems);
        return redirect()->back()->with('success', 'Product Added Successfully to Cart');
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cartItems = session()->get('cartItems');
            if (isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                session()->put('cartItems', $cartItems);
            }
            // dd($cartItems);
            return redirect()->back()->with('success', 'Product Deleted!!!');
        }
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cartItems = session()->get('cartItems');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cartItems', $cartItems);
        }
        return redirect()->back()->with('success', 'Cart quantity Updated!');
    }
    public function confirmCheckout(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        $order = '';
        $n = 0;
        if ($orders == null) {
            $order = '' . date('Ymd') . $user_id . $n;
            $order_id = (int)$order;
        } else {
            foreach ($orders as $done) {
                $n++;
            }
            $order = '' . date('Ymd') . $user_id . $n;
            $order_id = (int)$order;
        }
        $total = 0;
        $cartItems = session()->get('cartItems');
        foreach ($cartItems as $key => $value) {
            $total += $value['quantity'] * $value['price'];
        }
        Order::create([
            'id' => $order_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
            'pay_via' => $request->input('pay_via'),
            'amount' => $total,
            'status' => 0,
            'user_id' => $user_id
        ]);
        foreach ($cartItems as $key => $value) {
            CartItem::create([
                'product_id' => $key,
                'quantity' => $value['quantity'],
                'order_id' => $order_id
            ]);
        }
        return redirect()->route('myOrder')->with('success', 'Order Placed Successfully');
    }
    public function checkout()
    {
        return view('cart.checkout');
    }
    public function myOrder()
    {
        // return 'Order Placed';
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        return view('customer.order', [
            'orders' => $orders
        ]);
    }
    public function viewOrder($id)
    {
        // dd($id);
        $order = Order::findOrFail($id);
        if ($order != null) {
            return view('customer.orderinfo', [
                'order' => $order
            ]);
        } else {
            return redirect()->back();
        }
    }
}
