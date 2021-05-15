@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CITA
    </h3>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('appointment.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CITA</a>
        </li>
        <li>
            <a href="{{route('appointment.index')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
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
    <form method="post" action="{{route('appointment.update', $data["Appointment"]->id)}}" class="form-neon" autocomplete="off">
        @csrf
        @method('put')
        <fieldset>
            <legend><i class="fas fa-notes-medical"></i> &nbsp; Nueva Reserva de cita</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_dni" class="bmd-label-floating">Asunto</label>
                            <input type="text"  class="form-control" name="asunto" id="cliente_dni"  maxlength="27" value="{{$data["Appointment"]->case}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="cliente" required>
                                <option value="" selected="" disabled="">Cliente:</option>
                                @foreach ($data["Clients"] as $client)
                                @if($client->id == $data["Appointment"]->id_client)
                                <option selected value="{{$client->id}}">{{$client->name}}</option>
                                @else
                                <option value="{{$client->id}}">{{$client->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="encargado" required>
                                <option value="" selected="" disabled="">Encargado:</option>
                                @foreach ($data["Users"] as $user)
                                @if($user->id == $data["Appointment"]->id_user)
                                <option selected value="{{$user->id}}">{{$user->name}}</option>
                                @else
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="sucursal" required>
                                <option value="" selected="" disabled="">Sucursal:</option>
                                @foreach ($data["Offices"] as $office)
                                @if($office->id == $data["Appointment"]->id_office)
                                <option selected value="{{$office->id}}">{{$office->name}}</option>
                                @else
                                <option value="{{$office->id}}">{{$office->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_direccion" class="bmd-label-floating">Fecha</label>
                            <input type="date" class="form-control"  name="fecha" id="cliente_direccion" maxlength="150" value="{{$data["Appointment"]->date}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_direccion" class="bmd-label-floating">Hora</label>
                            <input type="time" class="form-control" name="hora" id="cliente_direccion" maxlength="150" value="{{$data["Appointment"]->time}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_direccion" class="bmd-label-floating">Detalle de Consulta</label>
                            <input type="text" class="form-control" name="detalle_consulta" id="cliente_direccion" maxlength="150" value="{{$data["Appointment"]->detail}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_direccion" class="bmd-label-floating">Precio</label>
                            <input type="number" class="form-control" name="precio" id="cliente_direccion" step="any" value="{{$data["Appointment"]->price}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="estado" required>
                                <option value="" selected="" disabled="">Estado:</option>
                                @foreach ($data["AppointmentStates"] as $appointmentstate)
                                @if($appointmentstate->id == $data["Appointment"]->id_appointment_state)
                                <option selected value="{{$appointmentstate->id}}">{{$appointmentstate->description}}</option>
                                @else
                                <option value="{{$appointmentstate->id}}">{{$appointmentstate->description}}</option>
                                @endif
                                @endforeach
                            </select>
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
