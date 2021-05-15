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
        
        @if($Order)
        <input value="{{$Order->id}}" type="hidden" name="id_order">
        @endif

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
                                    @if($Order)
                                        @if($Order->id_product == $product->id)
                                        <option value="{{$product->id.'?'.$product->price}}" selected>{{$product->name}}</option>
                                        @else
                                        <option value="{{$product->id.'?'.$product->price}}">{{$product->name}}</option>
                                        @endif
                                    @else
                                    <option value="{{$product->id.'?'.$product->price}}">{{$product->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select required class="form-control" name="id_client" required>
                                <option value="" selected="" disabled="">Seleccione un cliente</option>
                                @foreach ($data["Clients"] as $client)
                                    @if($Order)
                                        @if($Order->id_client == $client->id)
                                        <option value="{{$client->id}}" selected>{{$client->name}}</option>
                                        @else
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endif
                                    @else
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select required class="form-control" name="id_office" required>
                                <option value="" selected="" disabled="">Seleccione una Sucursal</option>
                                @foreach ($data["Offices"] as $office)
                                    @if($Order)
                                        @if($Order->id_office == $office->id)
                                        <option value="{{$office->id}}" selected>{{$office->name}}</option>
                                        @else
                                        <option value="{{$office->id}}">{{$office->name}}</option>
                                        @endif
                                    @else
                                    <option value="{{$office->id}}">{{$office->name}}</option>
                                    @endif
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
                            <label>Fecha de Entrega</label>
                            <input type="date" step="any" class="form-control" name="fecha"  maxlength="190" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Pago Total</label>
                            
                            @if($Order)
                            <input value="{{$Order->product->price}}" type="number" step="any" id="precio_total" class="form-control" name="total" maxlength="190" readonly >
                            @else
                            <input type="number" step="any" id="precio_total" class="form-control" name="total" maxlength="190" readonly >
                            @endif
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
