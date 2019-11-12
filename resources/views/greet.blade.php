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
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/main.css') }}" rel="stylesheet">
</head>
<body style="background:#5e35b1;font-family: 'DM Sans', sans-serif;">
    <div id="app">
       <div class="container mt-5 text-center">
           <h1 class="text-white text-uppercase font-weight-bold" style="padding-top:100px;line-height:1.7;">Online Food Ordering <br>and Delivery System<br>By<br>Ubong Sylvanus Akpan</h1>
           <p class="text-white">This project is branded as FoodyStack.</p><br>
           <a href="{{ url('/welcome') }}" class="btn greet font-weight-bold text-uppercase">Visit Site</a>&nbsp;
           <a target="_blank" href="https://github.com/evidenze/foodystack" class="btn greet font-weight-bold text-uppercase">View Source Code</a>
       </div>
    </div>
</body>
</html>
