@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('users.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
        </li>
        <li>
            <a class="active" href="{{route('users.create')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="form-group bmd-form-group">
                <label for="inputSearch" class="bmd-label-floating">¿Qué usuario estas buscando? Filtre por DNI, nombre, apellido o telefono</label>
                <input type="text" class="form-control input-find-in-table" name="busqueda-" target-table-id="table-user" maxlength="30">
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
        <table id="table-user" class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELÉFONO</th>
                    <th>EMAIL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td class="finder">{{$user->dni}}</td>
                    <td class="finder">{{$user->name}}</td>
                    <td class="finder">{{$user->lastname}}</td>
                    <td class="finder">{{$user->phone}}</td>
                    <td class="finder">{{$user->email}}</td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('users.destroy', $user->id)}}">
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
