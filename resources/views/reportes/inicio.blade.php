@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 col-md-6 col-sm-12">
            <canvas id="reportedevolucionespre" ></canvas>
        </div>
        <div class="col-6 col-md-6 col-sm-12">
            <canvas id="reportedevolucionespos" ></canvas>
        </div>
        <div class="col-6 col-md-6 col-sm-12">
            <canvas id="reporteentregaspre" ></canvas>
        </div>
        <div class="col-6 col-md-6 col-sm-12">
            <canvas id="reporteentregaspos" ></canvas>
        </div>
        <div class="col-6 col-md-6 col-sm-12">

                <canvas id="reportedevolucionestotales" ></canvas>

        </div>
        <div class="col-6 col-md-6 col-sm-12">

                <canvas id="reporteentregastotales" ></canvas>

        </div>
    </div>

@endsection
