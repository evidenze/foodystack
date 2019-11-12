@extends('layouts.app')

@section('content')
@if(session()->has('paid'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('paid') }}
    </div>
@endif

<div class="container mt-5 mb-5">
  <h4>Order Details</h4><br>
  <div class="card p-5 shadow-sm">
   <div class="row mb-5">
       <div class="col-md-2 mb-3">
           <p class="text-secondary">Product:</p>
           <p class="font-weight-bold">{{ $order->name }}</p>
       </div>
       <div class="col-md-2 mb-3">
           <p class="text-secondary">Quantity:</p>
           <p class="font-weight-bold">{{ $order->quantity }}</p>
       </div>
       <div class="col-md-2 mb-3">
           <p class="text-secondary">Payment Status:</p>
           <p class="font-weight-bold">{{ $order->paid == true ? 'Paid' : 'Pending payment' }}</p>
       </div>
       <div class="col-md-2 mb-3">
           <p class="text-secondary">Prize:</p>
           <p class="font-weight-bold">NGN {{ number_format($order->prize) }}</p>
       </div>
       <div class="col-md-4 mb-3">
           <p class="text-secondary">Delivery Status:</p>
           <p class="font-weight-bold">{{ $order->delivered == true ? 'Delivered' : 'Pending Delivery' }}</p>
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
