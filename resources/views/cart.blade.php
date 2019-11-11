@extends('layouts.app')

@section('content')

<div class="container mt-5">
  @if(count($items) == 0)
  <h4>No product added.</h4>
  @else
  <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Prize</th>
                <th scope="col">Net Prize</th>
                </tr>
            </thead>
            <tbody class="text-secondary">
                @foreach($items as $transfer)
                <tr>
                <td>{{ $transfer->name }}</td>
                <td>{{ $transfer->quantity }}</td>
                <td>NGN {{ $transfer->prize / $transfer->quantity }}</td>
                <td>NGN {{ number_format($transfer->prize) }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>

            <p>Total: NGN {{ number_format($items->sum('prize')) }}</p>
            <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
            <a class="btn cart" href="#">Continue Shopping</a>
        </div>
  @endif
</div>
@endsection
