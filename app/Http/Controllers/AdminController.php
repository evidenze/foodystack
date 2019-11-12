<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Orders::all();
        $pending = Orders::where('delivered', false)->get();
        $delivered = Orders::where('delivered', true)->get();
        $earning = Orders::all()->sum('prize');

        return view('admin', ['orders' => $orders, 'pending' => $pending, 'earning' => $earning, 'delivered' => $delivered]);
    }

    public function showOrderDetails(Request $request, $id)
    {
        $orders = Orders::where('id', $id)->first();

        return view('product-details', ['order' => $orders]);
    }

    public function confirmDelivery(Request $request)
    {
        $order = Orders::where('id', $request->id)->first();
        $order->delivered = true;
        $order->save();

        return back()->with('delivered', 'Order has been confirmed as delivered.');
    }
}
