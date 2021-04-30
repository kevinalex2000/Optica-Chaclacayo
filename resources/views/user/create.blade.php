@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="{{route('users.index')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
        </li>
        <li>
            <a href="{{route('users.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
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
    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data" class="form-neon" autocomplete="off">
        @csrf
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_dni" class="bmd-label-floating">DNI</label>
                            <input type="text" pattern="[0-9-]{1,20}" class="form-control" name="dni" id="usuario_dni" maxlength="20" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombres</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="name" id="usuario_nombre" maxlength="35" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_apellido" class="bmd-label-floating">Apellidos</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="lastname" id="usuario_apellido" maxlength="35" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_telefono" class="bmd-label-floating">Teléfono</label>
                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="phone" id="usuario_telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_direccion" class="bmd-label-floating">Dirección</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control" name="address" id="usuario_direccion" maxlength="190">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
            <div class="container-fluid">
                <div class="row">
                        <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_usuario" class="bmd-label-floating">Nombre de usuario</label>
                            <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="username" id="usuario_usuario" maxlength="35" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_email" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" name="email" id="usuario_email" maxlength="70">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave_1" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave_2" class="bmd-label-floating">Repetir contraseña</label>
                            <input type="password" class="form-control" name="password_repeat" id="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-medal"></i> &nbsp; Nivel de privilegio</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @foreach ($rols as $rol)
                        <p><span class="badge {{$rol->leyend}}">{{$rol->name}}</span> {{$rol->description}}</p>
                        @endforeach
                        <div class="form-group">
                            <select required class="form-control" name="id_rol">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                @foreach ($rols as $rol)
                                <option value="{{$rol->id}}">{{$rol->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-image"></i> &nbsp; Foto/Imagen del Producto</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" accept="image/png,image/jpeg" class="form-control" name="image">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
    </form>
</div>
@endsection
