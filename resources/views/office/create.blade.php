@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CITA
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem odit amet asperiores quis minus, dolorem repellendus optio doloremque error a omnis soluta quae magnam dignissimos, ipsam, temporibus sequi, commodi accusantium!
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="{{route('office.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CITA</a>
        </li>
        <li>
            <a href="{{route('office.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
        </li>
    </ul>
</div>

@if(session('messageResult'))
<div class="container-fluid">
    <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
</div>
@endif

<!-- Content here-->
<div class="container-fluid">
    <form method="post" action="{{route('office.store')}}" class="form-neon" autocomplete="off">
        @csrf
        <fieldset>
            <legend><i class="fas fa-building"></i> &nbsp; Nueva Sucursal</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_dni" class="bmd-label-floating">Nombre</label>
                            <input type="text"  class="form-control" name="name" id="cliente_dni" maxlength="27" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="encargado" required>
                                <option value="" selected="" disabled="">Encargado:</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="cliente_apellido" class="bmd-label-floating">Direccion</label>
                            <input type="text"  class="form-control" name="address" maxlength="40">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_direccion" class="bmd-label-floating">Costo de alquiler</label>
                            <input type="number" class="form-control" name="costo_alquiler" id="costo_alquiler" step="any" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_direccion" class="bmd-label-floating">Teléfono</label>
                            <input type="number" class="form-control" name="telefono"  maxlength="150" required>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
    </form>
</div>

@endsection
