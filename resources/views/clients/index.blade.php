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
            <a href="{{ route('newClient') }}"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE</a>
        </li>
        <li>
            <a class="active" href="{{ route('clients') }}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CLIENTES</a>
        </li>
    </ul>	
</div>

<!-- Content here-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
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
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
@endsection
