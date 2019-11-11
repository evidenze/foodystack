<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Orders;
use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showCart()
    {
        $items = Cart::where('session_id', session()->getId())->get();

        return view('cart', ['items' => $items]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $request->session()->put('name', $request->name);
        $request->session()->put('amount', floatval($request->prize));
        $request->session()->put('product_id', intval($request->id));
        $request->session()->put('quantity', intval($request->quantity));

        return view('checkout');
    }

    public function checkout()
    {
        $cart = Cart::where('session_id', session()->getId())->get();

        return view('checkout', ['cart' => $cart]);
    }

    public function showOrderDetails($id)
    {
        $order = Orders::where('id', $id)->first();

        return view('order-details', ['order' => $order]);
    }

    public function deleteOrder(Request $request)
    {
        $order = Orders::where('id', $request->id)->first();
        $order->delete();

        return back()->with('deleted', 'Order removed successfully!');
    }
}
