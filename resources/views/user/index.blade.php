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
    <div class="row group-inputs-finder" target-table-id="table-user" >
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="DNI" type="text" class="form-control input-finder" action="keyup" column-finder="dni" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Nombre" type="text" class="form-control input-finder" action="keyup" column-finder="name" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Usuario" type="text" class="form-control input-finder" action="keyup" column-finder="username" maxlength="30">
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
        <table id="table-user" class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>Imagen</th>
                    <th>DNI</th>
                    <th>USUARIO</th>
                    <th>NOMBRE COMPLETO</th>
                    <th>TELEFONO</th>
                    <th>EMAIL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td>
                        @if($user->image)
                        <img src="/assets/img/users/{{$user->id}}.{{$user->image}}" class="img-thumbnail" alt="">
                        @else
                        <img src="/assets/avatar/Avatar.png" class="img-thumbnail" >
                        @endif
                    </td>
                    <td column-finder-name="dni">{{$user->dni}}</td>
                    <td column-finder-name="username">{{$user->username}}</td>
                    <td column-finder-name="name">{{$user->name}} {{$user->lastname}}</td>
                    <td>{{$user->phone}}</td>
                    <td column-finder-name="email">{{$user->email}}</td>
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
