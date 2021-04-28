@extends('layouts.app')

@section('content')
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{route('appointment.create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CITA</a>
        </li>
        <li>
            <a class="active" href="{{route('appointment.create')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
        </li>
    </ul>
</div>

<div class="container-fluid py-4">
    <form>
        <div class="form-row group-inputs-finder" target-table-id="table-appointment">
          <div class="col-md-3">
            <input type="date" action="change" class="form-control input-finder" column-finder="fecha">
          </div>
          <div class="col-md-3">
            <select class="form-control input-finder" action="change" name="id_paciente" column-finder="paciente">
                <option value="" selected="">Paciente:</option>
                @foreach ($data["Clients"] as $client)
                <option value="{{$client->name}}">{{$client->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control input-finder" action="change" name="id_encargado" column-finder="encargado">
                <option value="" selected="" >Encargado:</option>
                @foreach ($data["Users"] as $user)
                <option value="{{$user->name}}">{{$user->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control input-finder" action="keyup" name="asunto" id="asunto" placeholder="Asunto" column-finder="asunto">
          </div>
        </div>
      </form>
</div>

@if(session('messageResult'))
<div class="container-fluid">
    <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
</div>
@endif
<!-- Content -->
<div class="container-fluid">
    <div class="table-responsive">
        <table id="table-appointment" class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>ASUNTO</th>
                    <th>ENCARGADO</th>
                    <th>PACIENTE</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>ESTADO</th>
                    <th>SUCURSAL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data["Appointment"] as $index => $appointment)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td column-finder-name="asunto">{{$appointment->case}}</td>
                    <td column-finder-name="encargado">{{$appointment->user->name}}</td>
                    <td column-finder-name="paciente">{{$appointment->client->name}}</td>
                    <td column-finder-name="fecha">{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y')}}</td>
                    <td>{{$appointment->time}}</td>
                    <td><span class="badge badge-{{$appointment->appointment_state->leyend}}">{{$appointment->appointment_state->description}}</span></td>
                    <td>{{$appointment->office->name}}</td>
                    <td>
                        <a href="{{route('appointment.edit', $appointment->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('appointment.destroy', $appointment->id)}}">
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
