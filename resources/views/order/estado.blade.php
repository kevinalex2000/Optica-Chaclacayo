@extends('layouts.app')

@section('content')

<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR ESTADO DEL PEDIDO
    </h3>
</div>


@if(session('messageResult'))
    <div class="container-fluid">
        <div class="alert alert-{{session('messageResult')['type']}}">{!!trans(session('messageResult')["message"])!!}</div>
    </div>
@endif

<!-- Content here-->
<div class="container-fluid">
    <form action="{{route('orders.updatestate', $Order->id)}}" method="post" autocomplete="off">
        @csrf
        @method('put')

        <div  class="form-neon mt-3">
            <fieldset>
                <legend>&nbsp; Detalles de devolución</legend>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input class="form-control" name="description"  type="text" placeholder="Ingrese una descripcion de anulación de pedido" value="" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Fecha de devolucion</label>
                                <input class="form-control" name="date_devolution" value="" type="date" required>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="order_details" name="order_details" value="">
            </fieldset>
        </div>
        <div  class="form-neon mt-3">
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
        </div>
    </form>
</div>

@endsection
