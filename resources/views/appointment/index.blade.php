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
        <div class="form-row">
          <div class="col">
            <input type="date" class="form-control">
          </div>
          <div class="col">
            <select class="form-control" name="id_paciente" required>
                <option value="" selected="" disabled="">Paciente:</option>
            </select>
          </div>
          <div class="col">
            <select class="form-control" name="id_encargado" required>
                <option value="" selected="" disabled="">Encargado:</option>
            </select>
          </div>
          <div class="col">
            <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto">
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
                    <th>PACIENTE</th>
                    <th>ENCARGADO</th>
                    <th>FECHA</th>
                    <th>ESTADO</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $index => $appointment)
                <tr class="text-center" >
                    <td>{{$index+1}}</td>
                    <td>{{$appointment->detail}}</td>
                    <td>{{$appointment->user()->name}}</td>
                    <td>{{$appointment->client()->name}}</td>
                    <td>{{$appointment->time}}</td>
                    <td>{{$appointment->appointment_state()->description}}</td>
                    <td>
                        <a href="{{route('appointments.edit', $appointment->id)}}" class="btn btn-success">
                              <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('appointments.destroy', $appointment->id)}}">
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
