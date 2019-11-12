@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 class="font-weight-bold">Admin Dashboard</h4>

            <div class="row mt-5">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <p class="font-weight-bold">Total Orders</p>
                        <h4>{{ count($orders) }}</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <p class="font-weight-bold">Pending Orders</p>
                        <h4>{{ count($pending) }}</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <p class="font-weight-bold">Total Earnings</p>
                        <h4>NGN {{ number_format($earning) }}</h4>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <p class="font-weight-bold">Delivered Orders</p>
                        <h4>{{ count($delivered) }}</h4>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-5 mb-5">
                <div class="card-header">Orders List</div>

                <div class="card-body">
                   @if (count($orders) == 0)
                    <h4>No order made.</h4><br>
                    <a class="btn cart" href="{{ url('/') }}">Go to Shop</a>

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
                            <th scope="col">Status</th>
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
                            <td>{{ $item->delivered == true ? 'Delivered' : 'Pending delivery' }}</td>
                            <td><a class="btn cart" href="{{ route('productDetails', $item->id) }}">View Details</a></td>
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
