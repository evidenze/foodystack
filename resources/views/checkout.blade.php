@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
  <div class="card shadow-sm p-3">
    <h4>Please confirm your order</h4><br>

    <p>Items</p><hr>
    <div class="table-responsive mb-5">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Prize</th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary">
                            <tr>
                            <td>{{ session('name') }}</td>
                            <td>{{ session('quantity') }}</td>
                            <td>NGN {{ number_format(session('prize') * session('quantity')) }}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>



                            <p>Delivery Information</p><hr>

                             <form method="GET" action="{{ route('placeOrder') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                            <label>{{ __('Delivery Address') }}</label>

                                <textarea rows="5" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Home or office address.
                                </small>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            <label>{{ __('Payment method') }}</label>

                                <div class="form-check">
                                    <input class="form-check-input" value="online" type="radio" name="payment_method" {{ old('payment_method') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="payment_method">
                                        {{ __('Pay Now') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" value="delivery" type="radio" name="payment_method" {{ old('payment_method') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="payment_method">
                                        {{ __('Pay on delivery') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn cart">
                                    {{ __('Place order now') }}
                                </button>
                            </div>
                        </div>
                    </form>

  </div>
</div>
@endsection
