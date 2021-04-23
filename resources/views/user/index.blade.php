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

<!-- Content -->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELÉFONO</th>
                    <th>USUARIO</th>
                    <th>EMAIL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center" >
                    <td>1</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="user-update.html" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="text-center" >
                    <td>2</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="user-update.html" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="text-center" >
                    <td>3</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="user-update.html" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="text-center" >
                    <td>4</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="user-update.html" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                  <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
