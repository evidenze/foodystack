@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">

                <div class="card-body text-center">
                    <p>Please click the button below to make payment for your order</p><br>


                    <button id="send" class="btn btn-success" type="button">Make Payment</button>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                    <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                    <script type="text/javascript">
                      document.addEventListener("DOMContentLoaded", function(event) {
                        document.getElementById('send').addEventListener('click', function () {

                        var flw_ref = "", chargeResponse = "", trxref = "FDKHGK"+ Math.random(), API_publicKey = "FLWPUBK-8f14588c2bb9f3d579759704c5957cd5-X";
                        var amount = "{{ session('amount') * session('quantity') }}";


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

                                window.location = '../confirm-payment/'+txref; //Add your success page here

                              } else {
                                window.location = "https://your_URL/paymentverification.php?txref="+txref;  //Add your failure page here
                              }
                            }
                          }
                        );
                        });
                      });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
