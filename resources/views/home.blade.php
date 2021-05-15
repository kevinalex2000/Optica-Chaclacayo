@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <h1 class="text-center">Bienvenido - Optica Chaclacayo</h1>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <a href="{{route('clients.index')}}">
            <div class="card text-center" style="width: 18rem;">
                <br>
                <p class="text-center"><i style="font-size: 50px;" class="fas fa-users fa-fw"></i></p>
                <div class="card-body">
                    Clientes
                </div>
              </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{route('products.index')}}">
            <div class="card text-center" style="width: 18rem;">
                <br>
                <p class="text-center"><i style="font-size: 50px;" class="fas fa-box fa-fw"></i></p>
                <div class="card-body">
                    Productos
                </div>
              </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{route('office.index')}}">
            <div class="card text-center" style="width: 18rem;">
                <br>
                <p class="text-center"><i style="font-size: 50px;" class="fas fa-building fa-fw"></i></p>
                <div class="card-body">
                    Sucursal
                </div>
              </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <a href="{{route('appointment.index')}}">
            <div class="card text-center" style="width: 18rem;">
                <br>
                <p class="text-center"><i style="font-size: 50px;" class="fas  fa-calendar-check fa-fw"></i></p>
                <div class="card-body">
                    Citas
                </div>
              </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{route('users.index')}}">
            <div class="card text-center" style="width: 18rem;">
                <br>
                <p class="text-center"><i style="font-size: 50px;" class="fas  fa-calendar-check fa-fw"></i></p>
                <div class="card-body">
                    Usuarios
                </div>
              </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{route('sales.index')}}">
            <div class="card text-center" style="width: 18rem;">
                <br>
                <p class="text-center"><i style="font-size: 50px;" class="fas  fa-store-alt fa-fw"></i></p>
                <div class="card-body">
                    Ventas
                </div>
              </div>
            </a>
        </div>
    </div>
</div>
@endsection
