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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                            <li>
                                <a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Reportes de gestión<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('reporte.index')}}"><i class="fas fa-plus fa-fw"></i>  Reportes post y pre</a>
                                    </li>

                                </ul>
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
<script>


    $( document ).ready(function() {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method:'get',
            url: '{{ route('reporte.reportedevolucionespre') }}',
            dataType: 'json'
        }).done(function (response) {
            var date_devolution=[];
            var cuenta=[];
            var date_delivered=[];
            var cuenta2=[];
            var ND=[];
            for (var i in response.data) {
                date_devolution.push(response.data[i].date_devolution);
                cuenta.push(response.data[i].cuenta);
                date_delivered.push(response.data[i].date_delivered);
                cuenta2.push(response.data[i].cuenta2);
                ND.push(response.data[i].ND);
            }
            const data = {
                labels: date_devolution,
                datasets: [
                    {
                    label: 'PD',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: cuenta,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(10, 10, 132)',
                        borderColor: 'rgb(255, 10, 132)',
                        data: cuenta2,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(150, 10, 132)',
                        borderColor: 'rgb(255, 3, 132)',
                        data: ND,
                    }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Nivel de devoluciones (Pre test)'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('reportedevolucionespre'),
                config
            );
        }).fail(function (xhr, status, errorMessage) {
            console.log('Error: ' + errorMessage);

        });
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method:'get',
            url: '{{ route('reporte.reportedevolucionespos') }}',
            dataType: 'json'
        }).done(function (response) {
            var date_devolution=[];
            var cuenta=[];
            var date_delivered=[];
            var cuenta2=[];
            var ND=[];
            for (var i in response.data) {
                date_devolution.push(response.data[i].date_devolution);
                cuenta.push(response.data[i].cuenta);
                date_delivered.push(response.data[i].date_delivered);
                cuenta2.push(response.data[i].cuenta2);
                ND.push(response.data[i].ND);
            }

            const data = {
                labels: date_devolution,
                datasets: [
                    {
                        label: 'PD',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: cuenta,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(10, 10, 132)',
                        borderColor: 'rgb(255, 10, 132)',
                        data: cuenta2,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(150, 10, 132)',
                        borderColor: 'rgb(255, 3, 132)',
                        data: ND,
                    }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Nivel de devoluciones (Pos test)'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('reportedevolucionespos'),
                config
            );
        }).fail(function (xhr, status, errorMessage) {
            console.log('Error: ' + errorMessage);

        });
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method:'get',
            url: '{{ route('reporte.reporteentregaspre') }}',
            dataType: 'json'
        }).done(function (response) {

            var fecha1=[];
            var cuenta=[];
            var fecha2=[];
            var cuenta2=[];
            var ND=[];
            for (var i in response.data) {
                fecha1.push(response.data[i].fecha1);
                cuenta.push(response.data[i].cuenta);
                fecha2.push(response.data[i].fecha2);
                cuenta2.push(response.data[i].cuenta2);
                ND.push(response.data[i].ND);
            }

            const data = {
                labels: fecha1,
                datasets: [
                    {
                        label: 'PD',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: cuenta,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(10, 10, 132)',
                        borderColor: 'rgb(255, 10, 132)',
                        data: cuenta2,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(150, 10, 132)',
                        borderColor: 'rgb(255, 3, 132)',
                        data: ND,
                    }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Nivel de entregas (Pos test)'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('reporteentregaspre'),
                config
            );
        }).fail(function (xhr, status, errorMessage) {
            console.log('Error: ' + errorMessage);
        });

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method:'get',
            url: '{{ route('reporte.reporteentregaspos') }}',
            dataType: 'json'
        }).done(function (response) {

            var fecha1=[];
            var cuenta=[];
            var fecha2=[];
            var cuenta2=[];
            var ND=[];
            for (var i in response.data) {
                fecha1.push(response.data[i].fecha1);
                cuenta.push(response.data[i].cuenta);
                fecha2.push(response.data[i].fecha2);
                cuenta2.push(response.data[i].cuenta2);
                ND.push(response.data[i].ND);
            }

            const data = {
                labels: fecha1,
                datasets: [
                    {
                        label: 'PD',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: cuenta,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(10, 10, 132)',
                        borderColor: 'rgb(255, 10, 132)',
                        data: cuenta2,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(150, 10, 132)',
                        borderColor: 'rgb(255, 3, 132)',
                        data: ND,
                    }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Nivel de entregas (Pos test)'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('reporteentregaspos'),
                config
            );
        }).fail(function (xhr, status, errorMessage) {
            console.log('Error: ' + errorMessage);
        });

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method:'get',
            url: '{{ route('reporte.reporteentregastotales') }}',
            dataType: 'json'
        }).done(function (response) {
            console.log(response.data);
            var fecha1=[];
            var cuenta=[];
            var fecha2=[];
            var cuenta2=[];
            var ND=[];
            for (var i in response.data) {
                fecha1.push(response.data[i].fecha1);
                cuenta.push(response.data[i].cuenta);
                fecha2.push(response.data[i].fecha2);
                cuenta2.push(response.data[i].cuenta2);
                ND.push(response.data[i].ND);
            }

            const data = {
                labels: fecha1,
                datasets: [
                    {
                        label: 'PD',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: cuenta,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(10, 10, 132)',
                        borderColor: 'rgb(255, 10, 132)',
                        data: cuenta2,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(150, 10, 132)',
                        borderColor: 'rgb(255, 3, 132)',
                        data: ND,
                    }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Total entregas por mes'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('reporteentregastotales'),
                config
            );
        }).fail(function (xhr, status, errorMessage) {
            console.log('Error: ' + errorMessage);
        });

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method:'get',
            url: '{{ route('reporte.reportedevolucionestotales') }}',
            dataType: 'json'
        }).done(function (response) {
            console.log(response.data);
            var date_devolution=[];
            var cuenta=[];
            var date_delivered=[];
            var cuenta2=[];
            var ND=[];
            for (var i in response.data) {
                date_devolution.push(response.data[i].date_devolution);
                cuenta.push(response.data[i].cuenta);
                date_delivered.push(response.data[i].date_delivered);
                cuenta2.push(response.data[i].cuenta2);
                ND.push(response.data[i].ND);
            }
            console.log(date_devolution);
            const data = {
                labels: date_devolution,
                datasets: [
                    {
                        label: 'PD',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: cuenta,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(10, 10, 132)',
                        borderColor: 'rgb(255, 10, 132)',
                        data: cuenta2,
                    },
                    {
                        label: 'PS',
                        backgroundColor: 'rgb(150, 10, 132)',
                        borderColor: 'rgb(255, 3, 132)',
                        data: ND,
                    }]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Total devoluciones por mes'
                        }
                    }
                }
            };
            const myChart = new Chart(
                document.getElementById('reportedevolucionestotales'),
                config
            );
        }).fail(function (xhr, status, errorMessage) {
            console.log('Error: ' + errorMessage);
        });
    });

</script>
</body>
</html>
