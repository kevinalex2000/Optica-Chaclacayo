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
                <input placeholder="name" type="text" class="form-control input-finder" action="keyup" column-finder="name" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Nombre" type="text" class="form-control input-finder" action="keyup" column-finder="name" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Usuario" type="text" class="form-control input-finder" action="keyup" column-finder="description" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Email" type="text" class="form-control input-finder" action="keyup" column-finder="email" maxlength="30">
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
                    <th>Imagen</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>STOCK INICIAL</th>
                    <th>STOCK</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td>
                        @if($product->image)
                        <img src="/assets/img/products/{{$product->id}}.{{$product->image}}" class="img-thumbnail" alt="">
                        @else
                        <img src="/assets/avatar/Avatar.png" class="img-thumbnail" >
                        @endif
                    </td>
                    <td column-finder-name="name">{{$product->name}}</td>
                    <td column-finder-name="description">{{$product->description}}</td>
                    <td>{{$product->stock_initial}}</td>
                    <td>{{$product->stock}}</td>
                    <td column-finder-name="price">{{$product->price}}</td>
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
