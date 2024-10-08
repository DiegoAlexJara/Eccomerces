<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function carrito(){
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        return view('user.carrito.cart-show', compact('cart'));
    }
}
