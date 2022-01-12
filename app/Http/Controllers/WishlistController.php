<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addProduct($productId)
    {
        // dd($productId);
        $userId = Auth::user()->id;
        $check = Wishlist::select('*')
            ->where([
                ['product_id', '=', $productId],
                ['user_id', '=', $userId]
            ])->first();
        if ($check != null) {
            return redirect()->route('productDescription', ['productId' => $productId])->with('error', 'Item is already in your wishlist');
        } else {
            Wishlist::create([
                'product_id' => $productId,
                'user_id' => $userId
            ]);
            return redirect()->route('productDescription', ['productId' => $productId])->with('success', 'Item added in your wishlist');
        }
    }
    public function index()
    {
        $userId = Auth::user()->id;
        $wishlistProducts = Wishlist::where('user_id', $userId)->get();
        return view('user.wishlist', [
            'wishlists' => $wishlistProducts
        ]);
    }
    public function destroy($wishlistId)
    {
        $userId = Auth::user()->id;
        $check = Wishlist::where([
            ['id', '=', $wishlistId],
            ['user_id', '=', $userId]
        ])->first();
        $check->delete();
        return redirect()->route('wishlist')->with('success', 'Item succesfully removed');
    }
}
