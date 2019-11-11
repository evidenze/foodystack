<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())->get();
        $items = Cart::where('session_id', session()->getId())->get();

        return view('home', ['orders' => $orders, 'products' => $items]);
    }

    /**
     * Process order.
     */
    public function processOrder(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        $address  = $request->address;
        $payment_method = $request->payment_method;

        if($payment_method == 'online'){

            $request->session()->put('address', $address);
            $request->session()->put('payment_method', $payment_method);

            return view('make-payment');
        }else{

            $order = new Orders;
            $order->prize = session('amount') * session('quantity');
            $order->address = session('address');
            $order->name = session('name');
            $order->quantity = session('quantity');
            $order->product_id = session('product_id');
            $order->paid = false;
            $order->user_id = Auth::id();
            $order->save();

            return redirect('home')->with('success', 'Order placed successfully.');
        }

    }

    /**
     * Verify payment and process the order.
     */
    public function confirmOrder(Request $request, $txref)
    {

        $ref = $txref;
        $amount = ""; //Correct Amount from Server
        $currency = ""; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK-eb1c0a9bb7d8071a58ea39be5b9a29cd-X",
            "txref" => $ref,
        );

        $data_string = json_encode($query);

        $ch = curl_init('https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0")) {


            $order = new Orders;
            $order->prize = session('amount') * session('quantity');
            $order->address = session('address');
            $order->name = session('name');
            $order->quantity = session('quantity');
            $order->product_id = session('product_id');
            $order->paid = true;
            $order->user_id = Auth::id();
            $order->save();

            return redirect('home')->with('success', 'Order placed successfully.');

        } else {
            //Dont Give Value and return to Failure page
        }

    }

    /**
     * Confirm payment and process the order.
     */
    public function confirmOrderPayment(Request $request, $txref, $product_id)
    {

        $ref = $txref;
        $amount = ""; //Correct Amount from Server
        $currency = ""; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK-eb1c0a9bb7d8071a58ea39be5b9a29cd-X",
            "txref" => $ref,
        );

        $data_string = json_encode($query);

        $ch = curl_init('https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0")) {


            $order = Orders::where('id', $product_id)->first();
            $order->paid = true;
            $order->save();

            return back()->with('paid', 'Payment successful!');

        } else {
            //Dont Give Value and return to Failure page
        }

    }

}
