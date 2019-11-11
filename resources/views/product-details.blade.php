@extends('layouts.app')

@section('content')
@if(session()->has('delivered'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('delivered') }}
    </div>
@endif

<div class="container mt-5">
   <div class="row mb-5">
       <div class="col-md-3">
           <h4>Product:</br><br>{{ $order->name }}</h4>
       </div>
       <div class="col-md-3">
           <h4>Quantity:</br><br>{{ $order->quantity }}</h4>
       </div>
       <div class="col-md-3">
           <h4>Payment Status:</br><br>{{ $order->paid == true ? 'Paid' : 'Pending payment' }}</h4>
       </div>
       <div class="col-md-3">
           <h4>Product:</br><br>{{ $order->name }}</h4>
       </div>
   </div>
</div>
@endsection
