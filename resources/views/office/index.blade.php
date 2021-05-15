@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE SUCURSALES
    </h3>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('office.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA SUCURSAL</a>
        </li>
        <li>
            <a class="active" href="{{route('office.create')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE SUCURSALES</a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row group-inputs-finder"  target-table-id="table-office" >
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Nombre" type="text" class="form-control input-finder" action="keyup" column-finder="name" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Direccion" type="text" class="form-control input-finder" action="keyup" column-finder="address" maxlength="30">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group"><select class="form-control input-finder" action="change" name="id_encargado" column-finder="encargado">
                <option value="" selected="" >Encargado:</option>
                @foreach ($data["Users"] as $office)
                <option value="{{$office->name}}">{{$office->name}}</option>
                @endforeach
            </select>
            </div>
          </div>
        <div class="col-md-3">
            <div class="form-group bmd-form-group">
                <input placeholder="Teléfono" type="number" class="form-control input-finder" action="keyup" column-finder="phone" maxlength="30">
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
        <table id="table-office" class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>DIRECCION</th>
                    <th>COSTO DE ALQUILER</th>
                    <th>ENCARGADO</th>
                    <th>TELÉFONO</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data["Offices"] as $index => $office)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td column-finder-name="name">{{$office->name}}</td>
                    <td column-finder-name="address">{{$office->address}}</td>
                    <td>{{$office->rental_price}}</td>
                    <td column-finder-name="encargado">{{$office->client->name}}</td>
                    <td column-finder-name="phone">{{$office->phone}}</td>
                    <td>
                        <a href="{{route('office.edit', $office->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('office.destroy', $office->id)}}">
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
