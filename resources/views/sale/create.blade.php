@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA VENTA
    </h3>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="{{route('sales.index')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA VENTA</a>
        </li>
        <li>
            <a href="{{route('sales.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE VENTAS</a>
        </li>
    </ul>
</div>
@if(session('messageResult'))
<div class="container-fluid">
    <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
</div>
@endif
<!-- Content -->
<div class="container-fluid">
    <form method="post" action="{{route('sales.store')}}" enctype="multipart/form-data" class="form-neon" autocomplete="off">
        @csrf
        <fieldset>
            <legend><i class="fas fa-box fa-fw"></i> &nbsp; Detalles de Venta</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_dni" class="bmd-label-floating">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="PRODUCTO_dni" value="{{$data['Codigo']}}" maxlength="20" readonly>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select required class="form-control" id="producto" name="id_product" required>
                                <option value="" selected="" disabled="">Seleccione un producto</option>
                                @foreach ($data["Products"] as $product)
                                <option value="{{$product->id.'?'.$product->price}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select required class="form-control" name="id_client" required>
                                <option value="" selected="" disabled="">Seleccione un cliente</option>
                                @foreach ($data["Clients"] as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select required class="form-control" name="id_office" required>
                                <option value="" selected="" disabled="">Seleccione una Sucursal</option>
                                @foreach ($data["Offices"] as $office)
                                <option value="{{$office->id}}">{{$office->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_apellido" class="bmd-label-floating">Encargado</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="usuario" value="{{ Auth::user()->name }}" maxlength="40" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_direccion" class="bmd-label-floating">Fecha de Entrega</label>
                            <input type="date" step="any" class="form-control" name="fecha"  maxlength="190">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_direccion" class="bmd-label-floating">Pago Total</label>
                            <input type="number" step="any" id="precio_total" class="form-control" name="total" maxlength="190" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>

        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
    </form>
</div>
@endsection
