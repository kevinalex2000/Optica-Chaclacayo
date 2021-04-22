@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
		<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem odit amet asperiores quis minus, dolorem repellendus optio doloremque error a omnis soluta quae magnam dignissimos, ipsam, temporibus sequi, commodi accusantium!
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('clients.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE</a>
        </li>
        <li>
            <a class="active" href="{{route('clients.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="form-group bmd-form-group">
                <label for="inputSearch" class="bmd-label-floating">¿Qué cliente estas buscando? Filtre por DNI, nombre, apellido o telefono</label>
                <input type="text" class="form-control input-find-in-table" name="busqueda-" target-table-id="table-client" maxlength="30">
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
        <table class="table table-dark table-sm" id="table-client">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCIÓN</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $index => $client)
                <tr class="text-center">
                    <td>{{$index+1}}</td>
                    <td class="finder">{{$client->dni}}</td>
                    <td class="finder">{{$client->name}}</td>
                    <td class="finder">{{$client->lastname}}</td>
                    <td class="finder">{{$client->phone}}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="popover" data-trigger="hover" title="" 
                        data-content="{{$client->address}}" data-original-title="{{$client->name}}">
						    <i class="fas fa-info-circle"></i>
						</button>
                    </td>
                    <td>
                        <a href="{{route('clients.edit', $client->id)}}" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>	
                            <div class="ripple-container"></div>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('clients.destroy', $client->id)}}" method="post">
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
