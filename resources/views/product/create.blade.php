@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PRODUCTO
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="{{route('products.index')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PRODUCTO</a>
        </li>
        <li>
            <a href="{{route('products.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS</a>
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
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data" class="form-neon" autocomplete="off">
        @csrf
        <fieldset>
            <legend><i class="fas fa-box fa-fw"></i> &nbsp; Categoria de producto</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select required class="form-control" name="id_category" required>
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                @foreach ($categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-cogs"></i> &nbsp; Caracteristicas</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_dni" class="bmd-label-floating">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="PRODUCTO_dni" maxlength="20" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text"  class="form-control" name="nombre" id="PRODUCTO_nombre" maxlength="35" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_telefono" class="bmd-label-floating">Cantidad</label>
                            <input type="number"  class="form-control" name="cantidad" id="PRODUCTO_telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_direccion" class="bmd-label-floating">Marca</label>
                            <input type="text"  class="form-control" name="marca" id="PRODUCTO_direccion" maxlength="190">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_direccion" class="bmd-label-floating">Material</label>
                            <input type="text" class="form-control" name="material" id="PRODUCTO_direccion" maxlength="190">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="PRODUCTO_direccion" class="bmd-label-floating">Precio</label>
                            <input type="number" step="any" class="form-control" name="precio" id="PRODUCTO_direccion" maxlength="190">
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
