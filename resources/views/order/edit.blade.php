@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR PEDIDO
    </h3>
</div>

@if(session('messageResult'))
<div class="container-fluid">
    <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
</div>
@endif

<!-- Content here-->
<div class="container-fluid">
    <form action="{{route('orders.update', $Order->id)}}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <div class="form-neon">
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group pt-0">
                                <legend> Categoria <span class="text-danger" style="font-size: 13px">*no editable*</span></legend>
                                
                                <input class="form-control" readonly name="category" value="{{$Order->product->category->name}}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div  class="form-neon mt-3">
            <fieldset>
                <legend>&nbsp; Datos de Pedido</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cliente_dni" class="bmd-label-floating">Cliente</label>
                            
                                <select class="form-control" name="client" required>
                                    <option value="">Seleccione el Cliente</option>
                                    @foreach ($Clients as $client)
                                        @if($Order->client->id == $client->id)
                                            <option value="{{$client->id}}" selected>{{$client->name}}</option>
                                        @else
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cliente_nombre" class="bmd-label-floating">
                                    Producto <span class="text-danger">*no editable*</span>
                                </label>
                            
                                <input class="form-control" readonly name="product" value="{{$Order->product->name}}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div  class="form-neon mt-3">
            <fieldset>
                <legend>&nbsp; Detalles</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Encargado <span class="text-danger">*no editable*</span></label>
                                <input class="form-control" type="text" value="{{$Order->user->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">
                                    Sucursal
                                </label>
                            
                                <select class="form-control" name="office" required>
                                    <option value="">Seleccione la Sucursal</option>
                                    @foreach ($Offices as $office)
                                        @if($Order->office->id == $office->id)
                                            <option value="{{$office->id}}" selected>{{$office->name}}</option>
                                        @else
                                            <option value="{{$office->id}}">{{$office->name}}</option>
                                        @endif
                                        <option value="{{$office->id}}">{{$office->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Adelanto</label>
                                <input class="form-control" name="precash"  type="number" placeholder="Ingrese un adelanto" value="{{$Order->prepayment}}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Cantidad Pedido</label>
                                <input class="form-control" name="quantity"  type="number" placeholder="Ingrese una Cantidad" value="{{$Order->quantity}}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Fecha de Entrega</label>
                                <input class="form-control" name="date" value="{{$Order->date_delivered}}" type="date" required>
                            </div>
                        </div>


                        @foreach ($FormCategories as $formCategory)

                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div>
                                    <label for="cliente_dni" class="text-capitalize">{{$formCategory->field}}:</label>
                                </div>

                                @php
                                $valor = "probando";
                                foreach ($OrderDetails as $orderDetail){
                                    if($formCategory->id == $orderDetail->id_form_category){
                                        $valor = $orderDetail->value;
                                        break;
                                    }
                                }
                                @endphp

                                @if($formCategory->type == "text")
                                <input name="{{$formCategory->id}}" class="value-details form-control" type="text" required>
                                @endif
                                @if($formCategory->type == "select")
                                    @foreach(explode("&",$formCategory->values) as $value)
                                        @if($valor == $value)
                                        <input name="{{$formCategory->id}}" class="value-details" type="radio" value="{{$value}}" required checked> {{$value}} &nbsp;
                                        @else
                                        <input name="{{$formCategory->id}}" class="value-details" type="radio" value="{{$value}}" required> {{$value}} &nbsp;
                                        @endif
                                    @endforeach
                                @endif 
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>

                <input type="hidden" id="order_details" name="order_details" value="">
            </fieldset>
        </div>
        <div  class="form-neon mt-3">
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
        </div>
    </form>
</div>	

@endsection
