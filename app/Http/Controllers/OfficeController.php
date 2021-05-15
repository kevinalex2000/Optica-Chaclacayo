<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->id_rol == 1) {
            abort(403, "No tienes autorización para ingresar.");
        }

        $users = User::all();
        $office = Office::all();
        return view('office.index')->with('data',array("Offices" => $office,"Users" => $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->id_rol == 1) {
            abort(403, "No tienes autorización para ingresar.");
        }

        $users = User::all();
        return view('office.create')->with("users" , $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->id_rol == 1) {
            abort(403, "No tienes autorización para ingresar.");
        }

            $office = new Office();

            $office->name = $request->post('name');
            $office->address = $request->post('address');
            $office->rental_price = $request->post('costo_alquiler');
            $office->id_user = $request->post('encargado');
            $office->phone = $request->post('telefono');
            $office->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> La sucursal <b>".$request->post('name')."</b> ha sido creada exitosamente"
            );

            return redirect("/office/create")->with('messageResult', $messageResult);
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
        if (!Auth::user()->id_rol == 1) {
            abort(403, "No tienes autorización para ingresar.");
        }

        $offices = Office::find($id);
        $users = User::all();
        return view('office.edit')->with('data',array("Office" => $offices,"Users" => $users));
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
        if (!Auth::user()->id_rol == 1) {
            abort(403, "No tienes autorización para ingresar.");
        }

        $office = Office::find($id);

        $office->name = $request->post('name');
        $office->address = $request->post('address');
        $office->rental_price = $request->post('costo_alquiler');
        $office->id_user = $request->post('encargado');
        $office->phone = $request->post('telefono');

        $office->save();

        $messageResult = array(
            "type" => "success",
            "message" => "<i class='fas fa-check mr-2'></i> La sucursal <b>".$request->post('name')."</b> ha sido editada exitosamente"
        );
        return redirect("/office/".$id."/edit")->with('messageResult', $messageResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->id_rol == 1) {
            abort(403, "No tienes autorización para ingresar.");
        }
        
        $office = Office::find($id);
        $office->delete();

        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> La sucursal <b>".$office->name."</b> ha sido eliminado exitosamente"
        );

        return redirect("/office")->with('messageResult', $messageResult);
    }
}
