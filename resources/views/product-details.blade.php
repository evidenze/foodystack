@extends('layouts.admin')

@section('content')
@if(session()->has('delivered'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('delivered') }}
    </div>
@endif

<div class="container mt-5">
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



   @if($order->delivered == false)
   <form method="POST" action="{{ route('confirmDelivery') }}" >
                @csrf
                @method('PUT')

                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <p><button type="submit" class="btn cart">
                        Confirm Delivery
                    </button></p>
    </form>
    @else
    <p><a class="btn cart disabled" href="#">Product Delivered</a></p>
   @endif
</div>
</div>
@endsection
