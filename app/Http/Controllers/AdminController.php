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

        return view('admin', ['orders' => $orders]);
    }
}
