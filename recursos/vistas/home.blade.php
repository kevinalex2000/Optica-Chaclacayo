extends('layouts.app')

@section('content')

@php
$idrol = Auth::user()->role->id;
@endphp

<div class="container">
    <div class="row m-2">
        <div class="col-12">
            <h2 style="font-weight: bold">Gestión ventas</h2>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row mb-4" >
                <div class="col-12" >
                    <div class="card text-white bg-primary" style="background: #28a745 !important;">
                        <div class="card-header">
                            <h4>Consultas</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row mb-4">
                {{--        <div class="col-md-4 mb-3">--}}
                {{--            <a href="{{route('clients.index')}}">--}}
                {{--            <div class="card text-center" style="width: 18rem;">--}}
                {{--                <br>--}}
                {{--                <p class="text-center"><i style="font-size: 50px;" class="fas fa-users fa-fw"></i></p>--}}
                {{--                <div class="card-body">--}}
                {{--                    Clientes--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--            </a>--}}
                {{--    </div>--}}
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($maorVentaVendedor))
                                @foreach ($maorVentaVendedor as $inscrito)
                                        S/. {{ $inscrito->MaxVal }}
                                @endforeach
                                @else
                                    S/. 0.00
                                @endif
                                </h5>
                            <p class="card-text">Mayor venta del día por vendedor</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"><i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>

                {{--        <div class="col-md-4 mb-3">--}}
                {{--            <a href="{{route('products.index')}}">--}}
                {{--            <div class="card text-center" style="width: 18rem;">--}}
                {{--                <br>--}}
                {{--                <p class="text-center"><i style="font-size: 50px;" class="fas fa-box fa-fw"></i></p>--}}
                {{--                <div class="card-body">--}}
                {{--                    Productos--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--            </a>--}}
                {{--        </div>--}}

                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($ventaTotalDia))
                                    @foreach ($ventaTotalDia as $inscrito)
                                        S/. {{ $inscrito->suma }}
                                    @endforeach
                                @else
                                    S/. 0.00
                                @endif
                            </h5>
                            <p class="card-text">Venta total del día</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
                {{--    @if($idrol == 1)--}}
                {{--        <div class="col-md-4 mb-3">--}}
                {{--            <a href="{{route('office.index')}}">--}}
                {{--            <div class="card text-center" style="width: 18rem;">--}}
                {{--                <br>--}}
                {{--                <p class="text-center"><i style="font-size: 50px;" class="fas fa-building fa-fw"></i></p>--}}
                {{--                <div class="card-body">--}}
                {{--                    Sucursal--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                {{--    @endif--}}
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($CantidadPedidosDia))
                                    @foreach ($CantidadPedidosDia as $inscrito)
                                        {{ $inscrito->cantidad }}
                                    @endforeach
                                @else
                                    0
                                @endif

                            </h5>
                            <p class="card-text">Cantidad de pedidos por día</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
                {{--        <div class="col-md-4 mb-3">--}}
                {{--            <a href="{{route('appointment.index')}}">--}}
                {{--            <div class="card text-center" style="width: 18rem;">--}}
                {{--                <br>--}}
                {{--                <p class="text-center"><i style="font-size: 50px;" class="fas  fa-calendar-check fa-fw"></i></p>--}}
                {{--                <div class="card-body">--}}
                {{--                    Citas--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--            </a>--}}
                {{--        </div>--}}

                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($ventaTotalDia))
                                    @foreach ($ventaTotalDia as $inscrito)
                                        S/. {{ $inscrito->suma }}
                                    @endforeach
                                @else
                                    S/. 0.00
                                @endif
                            </h5>
                            <p class="card-text">Monto total de ordenes del día</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>

                {{--    @if($idrol == 1)--}}
                {{--        <div class="col-md-4 mb-3">--}}
                {{--            <a href="{{route('users.index')}}">--}}
                {{--            <div class="card text-center" style="width: 18rem;">--}}
                {{--                <br>--}}
                {{--                <p class="text-center"><i style="font-size: 50px;" class="fas  fa-user-secret fa-fw"></i></p>--}}
                {{--                <div class="card-body">--}}
                {{--                    Usuarios--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--            </a>--}}
                {{--        </div>--}}
                {{--    @endif--}}
                {{--        <div class="col-md-4 mb-3">--}}
                {{--            <a href="{{route('sales.index')}}">--}}
                {{--            <div class="card text-center" style="width: 18rem;">--}}
                {{--                <br>--}}
                {{--                <p class="text-center"><i style="font-size: 50px;" class="fas  fa-store-alt fa-fw"></i></p>--}}
                {{--                <div class="card-body">--}}
                {{--                    Ventas--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--            </a>--}}
                {{--        </div>--}}
        </div>
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-dark  mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($MontoTotalVentasMes))
                                    @foreach ($MontoTotalVentasMes as $inscrito)
                                        S/. {{ $inscrito->total }}
                                    @endforeach
                                @else
                                    S/. 0.00
                                @endif
                            </h5>
                            <p class="card-text">Monto total de ventas del mes</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($CantidadProductosEntregados))
                                    @foreach ($CantidadProductosEntregados as $inscrito)
                                        {{ $inscrito->cantidad }}
                                    @endforeach
                                @else
                                    0
                                @endif
                            </h5>
                            <p class="card-text">Cantidad de productos no entregados</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-light  mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($CantidadProductosNoEntregados))
                                    @foreach ($CantidadProductosNoEntregados as $inscrito)
                                        {{ $inscrito->cantidad }}
                                    @endforeach
                                @else
                                    0
                                @endif
                            </h5>
                            <p class="card-text">Cantidad de productos entregados</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">
                                @if (isset($CantidadProductosDevueltos))
                                    @foreach ($CantidadProductosDevueltos as $inscrito)
                                         {{ $inscrito->cantidad }}
                                    @endforeach
                                @else
                                    0
                                @endif
                            </h5>
                            <p class="card-text">Cantidad de devueltos por mes</p>
                        </div>
                        <div class="card-footer bg-transparent border-success"> <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>


    </div>

    </div>
</div>
@endsection
