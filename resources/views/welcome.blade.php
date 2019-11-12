@extends('layouts.app')

@section('content')
<div class="container-fluid head2 text-center">
    <h1 class="head-text font-weight-bold">Food delivery at your <br>door step</h1>
</div>

@if(session()->has('done'))
    <div class="alert alert-success" role="alert">
        {{ session('done') }}
    </div>
@endif

<div class="container mt-5">

    <h1>Our Products</h1>

    <div class="card-deck text-center mt-5 mb-5">
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/fried.jpeg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Fried Rice</h5>
            <p class="text-center text-secondary">NGN1,200</p>
            <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="1"/>
                    <input type="hidden" name="name" value="Fried Rice">
                    <input type="hidden" name="prize" value="1200">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
            </div>
        </div>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/shawarma.png') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Sharwarma</h5>
            <p class="text-center text-secondary">NGN1,500</p>
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="2"/>
                    <input type="hidden" name="name" value="Shawarma">
                    <input type="hidden" name="prize" value="1500">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/hamburger.jpeg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Hamburger</h5>
            <p class="text-center text-secondary">NGN1,500</p>            
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="3"/>
                    <input type="hidden" name="name" value="Hamburger">
                    <input type="hidden" name="prize" value="1500">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/jollof-rice.jpg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Jollof Rice</h5>
            <p class="text-center text-secondary">NGN1,200</p>
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="4"/>
                    <input type="hidden" name="name" value="Jollof Rice">
                    <input type="hidden" name="prize" value="1200">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
    </div>

    <div class="card-deck text-center mt-5 mb-5">
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/plantain.jpg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Fried Plantain</h5>
            <p class="text-center text-secondary">NGN1,000</p>
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="5"/>
                    <input type="hidden" name="name" value="Fried Plantaine">
                    <input type="hidden" name="prize" value="1000">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
       <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/meat.jpeg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Meat Pie</h5>
            <p class="text-center text-secondary">NGN600</p>
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="6"/>
                    <input type="hidden" name="name" value="Meat Pie">
                    <input type="hidden" name="prize" value="600">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/afan.jpg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Afang Soup</h5>
            <p class="text-center text-secondary">NGN500</p>
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="7"/>
                    <input type="hidden" name="name" value="Afang Soup">
                    <input type="hidden" name="prize" value="500">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
            <img src="{{ url('/images/okro.jpg') }}" class="mx-auto d-block" alt="..." style="width:100%;height:200px;object-fit:contain;"><br>
            <h5 class="card-title font-weight-bold">Okro Soup</h5>
            <p class="text-center text-secondary">NGN500</p>
               <form method="POST" action="{{ route('addToCart') }}" >
                @csrf
                <input placeholder="Quantity" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>

                <input type="hidden" name="id" value="8"/>
                    <input type="hidden" name="name" value="Okro Soup">
                    <input type="hidden" name="prize" value="500">
                    <button type="submit" class="btn cart">
                        Order Now
                    </button>
            </form>
        </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark pt-5 pb-5 mt-5 text-center text-white">
    <p>&copy; 2019 FoodyStack. All Right Reserved.</p>
</div>
@endsection
