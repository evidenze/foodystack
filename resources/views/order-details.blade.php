@extends('layouts.app')

@section('content')
@if(session()->has('paid'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('paid') }}
    </div>
@endif

<div class="container mt-5">
  <div class="card p-3 shadow-sm">
   <div class="row mb-5">
       <div class="col-md-2">
           <h4>Product:</br><br>{{ $order->name }}</h4>
       </div>
       <div class="col-md-2">
           <h4>Quantity:</br><br>{{ $order->quantity }}</h4>
       </div>
       <div class="col-md-2">
           <h4>Payment Status:</br><br>{{ $order->paid == true ? 'Paid' : 'Pending payment' }}</h4>
       </div>
       <div class="col-md-2">
           <h4>Product:</br><br>{{ $order->name }}</h4>
       </div>
       <div class="col-md-4">
           <h4>Delivery Status:</br><br>{{ $order->delivered == true ? 'Delivered' : 'Pending Delivery' }}</h4>
       </div>
       
   </div>

   @if(!$order->paid)
    <p><button id="send" class="btn btn-success" type="button">Make Payment</button></p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                    <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                    <script type="text/javascript">
                      document.addEventListener("DOMContentLoaded", function(event) {
                        document.getElementById('send').addEventListener('click', function () {

                        var flw_ref = "", chargeResponse = "", trxref = "FDKHGK"+ Math.random(), API_publicKey = "FLWPUBK-8f14588c2bb9f3d579759704c5957cd5-X";
                        var amount = "{{ $order->prize }}";
                        var product_id = "{{ $order->id }}";


                        getpaidSetup(
                          {
                            PBFPubKey: API_publicKey,
                          	customer_email: "{{ Auth::user()->email }}",
                          	amount: amount,
                          	customer_phone: "{{ Auth::user()->phone }}",
                          	customer_firstname: "{{ Auth::user()->firstname }}",
                          	custom_description: "Payment",
                          	currency: "NGN",
                          	custom_title: "Food Order Payment",
                          	payment_method: "both",
                          	txref: trxref,

                            onclose:function(response) {
                            },
                            callback:function(response) {
                              txref = response.tx.txRef, chargeResponse = response.tx.chargeResponseCode;
                              if (chargeResponse == "00" || chargeResponse == "0") {

                                window.location = '../confirm-order-payment/'+txref+'/'+product_id; //Add your success page here

                              } else {
                                window.location = "https://your_URL/paymentverification.php?txref="+txref;  //Add your failure page here
                              }
                            }
                          }
                        );
                        });
                      });
                    </script>
   @else
       <p><a class="btn cart disabled" href="#">Paid</a></p>
    @endif

    @if($order->delivered == false && $order->paid == true)
   <form method="POST" action="{{ route('confirmDelivery') }}" >
                @csrf
                @method('PUT')

                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <p>button type="submit" class="btn btn-primary">
                        Confirm Delivery
                    </button></p>
    </form>
    @elseif($order->delivered == false && $order->paid == false)
    <p><a class="btn btn-primary disabled" href="#">Confirm delivery</a></p>
    @else
        <p><a class="btn btn-primary disabled" href="#">Delivered</a></p>
   @endif
</div>
</div>
@endsection
