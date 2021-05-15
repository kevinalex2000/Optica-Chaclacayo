@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header" style="padding-bottom: 30px">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; REGISTRAR PEDIDO
    </h3>
</div>

<!-- Content here-->
<div class="container-fluid">
    <form method="post" action="{{route('orders.store')}}" autocomplete="off">
        @csrf
        <div  class="form-neon">
            <fieldset>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group pt-0">
                                <legend> Categoria</legend>
                            
                                <select id="select_category_order" class="form-control" name="category" required>
                                    @foreach ($data["categories"] as $category)
                                        @if($data["idcategory"] == $category->id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
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
                                    @foreach ($data["clients"] as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cliente_nombre" class="bmd-label-floating">
                                    Producto
                                </label>
                            
                                <select class="form-control" name="product" required>
                                    <option value="">Seleccione el Producto</option>
                                    @foreach ($data["products"] as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
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
                                <label class="bmd-label-floating">Encargado</label>
                                <input class="form-control" type="hidden" value="{{ Auth::user()->id }}" name="user" >
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">
                                    Sucursal
                                </label>
                            
                                <select class="form-control" name="office" required>
                                    <option value="">Seleccione la Sucursal</option>
                                    @foreach ($data["offices"] as $office)
                                        <option value="{{$office->id}}">{{$office->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Adelanto</label>
                                <input class="form-control" name="precash"  type="number" placeholder="Ingrese un adelanto" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Cantidad Pedido</label>
                                <input class="form-control" name="quantity"  type="number" placeholder="Ingrese una Cantidad" value="1" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Fecha de Entrega</label>
                                <input class="form-control" name="date"  type="date" required>
                            </div>
                        </div>

                        @foreach ($data["formCategories"] as $formCategory)

                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div>
                                    <label for="cliente_dni" class="text-capitalize">{{$formCategory->field}}:</label>
                                </div>
                                @if($formCategory->type == "text")
                                <input name="{{$formCategory->id}}" class="value-details form-control" type="text" required>
                                @endif 
                                @if($formCategory->type == "select")
                                    @foreach(explode("&",$formCategory->values) as $value)
                                    <input name="{{$formCategory->id}}" class="value-details" type="radio" value="{{$value}}" required> {{$value}} &nbsp; 
                                    @endforeach
                                @endif 
                            </div>
                        </div>
                        
                        @endforeach

                        <input type="hidden" id="order_details" name="order_details">

                    </div>
                </div>
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
