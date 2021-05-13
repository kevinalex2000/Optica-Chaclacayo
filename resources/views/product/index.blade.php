@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('products.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PRODUCTO</a>
        </li>
        <li>
            <a class="active" href="{{route('products.create')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row group-inputs-finder" target-table-id="table-product" >
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Codigo" type="text" class="form-control input-finder" action="keyup" column-finder="codigo" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Nombre" type="text" class="form-control input-finder" action="keyup" column-finder="name" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Marca" type="text" class="form-control input-finder" action="keyup" column-finder="marca" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Categoria" type="text" class="form-control input-finder" action="keyup" column-finder="category" maxlength="30">
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
        <table id="table-product" class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>MARCA</th>
                    <th>MATERIAL</th>
                    <th>STOCK INICIAL</th>
                    <th>STOCK</th>
                    <th>PRECIO</th>
                    <th>CATEGORIA</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td column-finder-name="codigo">{{$product->code}}</td>
                    <td column-finder-name="name">{{$product->name}}</td>
                    <td column-finder-name="marca">{{$product->trademark}}</td>
                    <td>{{$product->material}}</td>
                    <td>{{$product->stock_initial}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->price}}</td>
                    <td column-finder-name="category">{{$product->category->name}}</td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('products.destroy', $product->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
