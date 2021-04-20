<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

	<script src="{{ asset('js/sweetalert2.min.js') }}" ></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-design.min.css') }}">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">

    <!-- General Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>

    <!-- popper -->
    <script src="{{ asset('js/popper.min.js') }}" ></script>

    <!-- Bootstrap V4.3 -->
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}" ></script>

    <!-- Bootstrap Material Design V4.0 -->
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}" ></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

    <script src="{{ asset('js/main.js') }}" ></script>
</body>
</html>
