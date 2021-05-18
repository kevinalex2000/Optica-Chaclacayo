@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header" style="padding-bottom: 30px">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; REGISTRAR PEDIDO
    </h3>
</div>


<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="{{route('orders.select_category')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; REGISTRAR PEDIDO</a>
        </li>
        <li>
            <a href="{{route('orders.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PEDIDOS</a>
        </li>
    </ul>
</div>

<!-- Content here-->
<div class="container-fluid">
    <form method="post" action="{{route('clients.store')}}" class="form-neon" autocomplete="off">
        @csrf
        <fieldset>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group pt-0">
                            <legend> Categoria</legend>
                        
                            <select id="select_category_order"  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="address" id="cliente_direccion" maxlength="150">
                                <option value="">Seleccione una Categoria para continuar</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>

@endsection
