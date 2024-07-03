<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Session::get('cart');
        if (!is_array($cart)) {
            // Nếu không phải mảng, gán cho $cart là một mảng trống
            $cart = [];
        }
        $product_id = array_keys($cart);
        $products = Product::whereIn('id',$product_id)->get();
        return view('cart', compact('products'));
    }
    public function addCart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        if (is_null(Session::get('cart'))) {

            Session::put('cart', [
                $product_id => $quantity,
            ]);
            return redirect()->route('cart');
        }
        else{
            $cart = Session::get('cart');
            if(Arr::exists($cart,$product_id)){
                $cart[$product_id] = $cart[$product_id] + $quantity;
                Session::put('cart',$cart);
                return redirect()->route('cart');
            }
            else{
                $cart[$product_id] = $quantity;
                Session::put('cart',$cart);
                return redirect()->route('cart');
            }
        }
    }
    public function delCart(Request $request){
        $cart = Session::get('cart');
        $product_id = $request->id;
        unset($cart[$product_id]);
        Session::put('cart',$cart);
        return redirect()->route('cart');
    }
    public function updateCart(Request $request){
       $cart = $request->product_id;
        Session::put('cart',$cart);
        return redirect()->route('cart');
    }
}
