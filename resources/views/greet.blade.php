<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/main.css') }}" rel="stylesheet">
</head>
<body style="background:#5e35b1;">
    <div id="app">
       <div class="container mt-5 text-center">
           <h1 class="text-white text-uppercase" style="padding-top:100px;">Online Food Ordering and Delivery System</h1><br>
           <a href="{{ url('/welcome') }}" class="btn greet">Visit Site</a>
       </div>
    </div>
</body>
</html>
