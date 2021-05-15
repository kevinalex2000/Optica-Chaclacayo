@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
		<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PEDIDOS
    </h3>
</div>
<div class="container-fluid">
    <div class="row group-inputs-finder" target-table-id="table-order" >
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <select class="form-control input-finder" action="change" column-finder="cliente">
                    <option value="" selected="">Cliente:</option>
                    @foreach ($Clients as $client)
                    <option value="{{$client->name}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <select class="form-control input-finder" action="change" column-finder="producto">
                    <option value="" selected="">Producto:</option>
                    @foreach ($Products as $product)
                    <option value="{{$product->name}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <select class="form-control input-finder" action="change" column-finder="sucursal">
                    <option value="" selected="">Sucursal:</option>
                    @foreach ($Offices as $office)
                    <option value="{{$office->name}}">{{$office->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Fecha" type="date" class="form-control input-finder" action="change" column-finder="fecha" maxlength="30">
            </div>
        </div>
    </div>
</div>

@if(session('messageResult'))
<div class="container-fluid">
    <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
</div>
@endif


<!-- Content here-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm" id="table-order">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>CLIENTE</th>
                    <th>PRODUCTO</th>
                    <th>SUCURSAL</th>
                    <th>FECHA DE ENTREGA</th>
                    <th>ESTADO</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                    <th>VENTA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Orders as $index => $order)
                <tr class="text-center" >
                    <td column-finder-name="cliente">{{$order->client->name}}</td>
                    <td column-finder-name="producto">{{$order->product->name}}</td>
                    <td column-finder-name="sucursal">{{$order->office->name}}</td>
                    <td>{{\Carbon\Carbon::parse($order->date_delivered)->format('d/m/Y')}}</td>
                    <td>
                        @if($order->is_delivered)
                        <span class="badge badge-success">Entregado</span>
                        @else
                        <span class="badge badge-info">No Entregado</span>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{route('orders.edit', $order->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('orders.destroy', $order->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                    
                        @if($order->is_delivered)
                        Completado
                        @else
                        <form method="get" action="{{route('sales.create')}}">
                            <input type="hidden" name="pedido" value="{{$order->id}}">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-dollar-sign"></i>
                                <b>Agregar a Venta</b>
                            </button>
                        </form>
                        @endif
                    </td>
                    <td style="display: none" column-finder-name="fecha">{{$order->date_delivered}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
