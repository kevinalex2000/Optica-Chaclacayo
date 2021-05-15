@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE VENTAS
    </h3>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('sales.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA VENTA</a>
        </li>
        <li>
            <a class="active" href="{{route('sales.create')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE VENTAS</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row group-inputs-finder" target-table-id="table-sale" >
        <div class="col-md-4">
            <div class="form-group bmd-form-group">
                <input placeholder="Codigo" type="text" class="form-control input-finder" action="keyup" column-finder="codigo" maxlength="30">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group bmd-form-group">
                <input placeholder="Cliente" type="text" class="form-control input-finder" action="keyup" column-finder="cliente" maxlength="30">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group bmd-form-group">
                <input placeholder="Producto" type="text" class="form-control input-finder" action="keyup" column-finder="producto" maxlength="30">
            </div>
        </div>
    </div>
</div>

@if(session('messageResult'))
<div class="container-fluid">
    <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
</div>
@endif
<!-- Content -->
<div class="container-fluid">
    <div class="table-responsive">
        <table id="table-sale" class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>CODIGO</th>
                    <th>CLIENTE</th>
                    <th>PRODUCTO</th>
                    <th>ENCARGADO</th>
                    <th>TOTAL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                    <th>DESCARGAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $index => $sale)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td column-finder-name="codigo">{{$sale->code}}</td>
                    <td column-finder-name="cliente">{{$sale->client->name}}</td>
                    <td column-finder-name="producto">{{$sale->product->name}}</td>
                    <td>{{$sale->user->name}}</td>
                    <td>{{$sale->total}}</td>
                    <td>
                        <a href="{{route('sales.edit', $sale->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('sales.destroy', $sale->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('descargarPDF',$sale->id)}}"><button type="submit" class="btn btn-primary">
                                <i class="fas fa-download"></i>
                            </button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
