@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h4>Welcome {{ Auth::user()->firstname }}</h4><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">My orders</div>

                <div class="card-body">
                   @if (count($orders) == 0)
                    <h4 class="text-center">No order yet.</h4><br>
                    <p class="text-center"><a class="btn cart" href="{{ url('/welcome') }}">Go to Shop</a></p>

                    @else
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Prize</th>
                            <th scope="col">Date</th>
                            <th scope="col">Payment Status</th>                            
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary">
                            @foreach($orders as $item)
                            <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>NGN {{ number_format($item->prize) }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->paid == true ? 'Paid' : 'Make payment' }}</td>
                            <td><a class="btn cart" href="{{ route('orderDetails', $item->id)}}">View Details</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
