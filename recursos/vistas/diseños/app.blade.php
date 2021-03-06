<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Optica Chaclacayo') }}</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<!-- jQuery V3.4.1 -->

	<script src="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/svg-with-js.min.css" ></script>

</head>
<body>
    <div id="app">

        @php
        $idrol = Auth::user()->role->id;
        @endphp

        <!-- Main container -->
        <main class="full-box main-container">
            <!-- Nav lateral -->
            <section class="full-box nav-lateral">
                <div class="full-box nav-lateral-bg show-nav-lateral"></div>
                <div class="full-box nav-lateral-content">
                    <figure class="full-box nav-lateral-avatar">
                        <i class="far fa-times-circle show-nav-lateral"></i>
                        @if(Auth::user()->image)
                        <img src="{{Auth::user()->image}}" class="img-fluid avatar" alt="Avatar">
                        @else
                        <img src="/assets/avatar/Avatar.png" class="img-fluid avatar" alt="Avatar">
                        @endif
                        <figcaption class="roboto-medium text-center">
                            {{ Auth::user()->name }} {{ Auth::user()->lastname }} <br>
                            <small class="roboto-condensed-light">
                            {{ Auth::user()->role->name }}
                            </small>
                        </figcaption>
                    </figure>
                    <div class="full-box nav-lateral-bar"></div>
                    <nav class="full-box nav-lateral-menu">
                        <ul>
                            <li>
                                <a href="/home"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Escritorio</a>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('clients.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a>
                                    </li>
                                    <li>
                                        <a href="{{route('clients.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-boxes fa-fw"></i> &nbsp; Productos <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('products.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Producto</a>
                                    </li>
                                    <li>
                                        <a href="{{route('products.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Productos</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-box fa-fw"></i> &nbsp; Pedidos <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('orders.select_category')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Registrar Pedido</a>
                                    </li>
                                    <li>
                                        <a href="{{route('orders.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Pedidos</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Ventas <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('sales.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Registrar Venta</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sales.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Ventas</a>
                                    </li>
                                </ul>
                            </li>

                            @if($idrol == 1)
                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas fa-building fa-fw"></i> &nbsp; Sucursal <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('office.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar sucursal</a>
                                    </li>
                                    <li>
                                        <a href="{{route('office.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de sucursales</a>
                                    </li>
                                </ul>
                            </li>
                            @endif

                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas  fa-calendar-check fa-fw"></i> &nbsp; Citas <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('appointment.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva Cita</a>
                                    </li>
                                    <li>
                                        <a href="{{route('appointment.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Citas</a>
                                    </li>
                                </ul>
                            </li>

                            @if($idrol == 1)
                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('users.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            
                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas  fa-calendar-check fa-fw"></i> &nbsp; Reportes <i class="fas fa-chevron-down"></i></a>
                                
                            </li>
        @endif
    
                        </ul>
                    </nav>
                </div>
            </section>

            <!-- Page content -->
            <section class="full-box page-content">
                <nav class="full-box navbar-info">
                    <a href="#" class="float-left show-nav-lateral">
                        <i class="fas fa-exchange-alt"></i>
                    </a>
                    <a href="{{route('users.edit', Auth::user()->id)}}">
                        <i class="fas fa-user-cog"></i>
                    </a>

                    <a class="btn-exit-system" href="#">
                        <i class="fas fa-power-off"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>

                @yield('content')

            </section>

    </div>


	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->


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

    <script src="{{ asset('js/finder-table.js') }}" ></script>
</body>
</html>
