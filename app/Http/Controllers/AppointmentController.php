<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentState;
use App\Models\Client;
use App\Models\Office;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $users = User::all();
        $appointments = Appointment::all();
        return view('appointment.index')->with('data',array("Appointment" => $appointments,"Clients" =>$clients,"Users" => $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $offices = Office::all();
        return view('appointment.create')->with('data',array("Clients" => $clients,"Offices" => $offices));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $appointment = new Appointment();

            $id_user = Auth::user()->id;

            $appointment->date = $request->post('fecha');
            $appointment->time = $request->post('hora');
            $appointment->case = $request->post('asunto');
            $appointment->detail = $request->post('detalle_consulta');
            $appointment->price = $request->post('precio');
            $appointment->id_appointment_state = '2';
            $appointment->id_client = $request->post('cliente');
            $appointment->id_user =  $id_user;
            $appointment->id_office = $request->post('sucursal');
            $appointment->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> La cita <b>".$request->post('asunto')."</b> ha sido creada exitosamente"
            );

            return redirect("/appointment/create")->with('messageResult', $messageResult);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $clients = Client::all();
        $offices = Office::all();
        $users = User::all();
        $appointment_state = AppointmentState::all();
        return view('appointment.edit')->with('data',array("Appointment" => $appointment,"Clients" =>$clients, "Offices" => $offices,"AppointmentStates" => $appointment_state,"Users" => $users));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        $appointment->date = $request->post('fecha');
        $appointment->time = $request->post('hora');
        $appointment->case = $request->post('asunto');
        $appointment->detail = $request->post('detalle_consulta');
        $appointment->price = $request->post('precio');
        $appointment->id_appointment_state = $request->post('estado');
        $appointment->id_client = $request->post('cliente');
        $appointment->id_user =  $request->post('encargado');
        $appointment->id_office = $request->post('sucursal');

        $appointment->save();

        $messageResult = array(
            "type" => "success",
            "message" => "<i class='fas fa-check mr-2'></i> La cita <b>".$request->post('asunto')."</b> ha sido editada exitosamente"
        );
        return redirect("/appointment/".$id."/edit")->with('messageResult', $messageResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> La cita <b>".$appointment->case."</b> ha sido eliminado exitosamente"
        );

        return redirect("/appointment")->with('messageResult', $messageResult);
    }
}
