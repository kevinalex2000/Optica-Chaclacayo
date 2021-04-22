<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all();
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientExist = Client::where('dni', $request->post('dni'))->first();

        if(!$clientExist){
            $client = new Client();

            $client->dni = $request->post('dni');
            $client->name = $request->post('name');
            $client->lastname = $request->post('lastname');
            $client->phone = $request->post('phone');
            $client->address = $request->post('address');

            $client->save();

            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> El cliente <b>".$request->post('name')."</b> ha sido registrado exitosamente"
            );
        }else{
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido crear el cliente debido que el DNI <b>".$request->post('dni')."</b> ya esta siendo utilizado"
            );            
        }

        return redirect("/clients/create")->with('messageResult', $messageResult);
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
        $client = Client::find($id);
        return view('client.edit')->with('client', $client);
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
        $clientExist = Client::where('dni', $request->post('dni'))->first();

        // Si el cliente con dni no existe o si es el mismo
        if(!$clientExist || $clientExist->id == $id){

            $client = Client::find($id);

            $client->dni = $request->post('dni');
            $client->name = $request->post('name');
            $client->lastname = $request->post('lastname');
            $client->phone = $request->post('phone');
            $client->address = $request->post('address');

            $client->save();
                
            $messageResult = array(
                "type" => "success",
                "message" => "<i class='fas fa-check mr-2'></i> El cliente <b>".$request->post('name')."</b> ha sido editado exitosamente"
            );
        }else{
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido editar el cliente debido que el DNI <b>".$request->post('dni')."</b> ya esta siendo utilizado"
            );            
        }

        return redirect("/clients/".$id."/edit")->with('messageResult', $messageResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        
        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> El cliente <b>".$client->name."</b> ha sido eliminado exitosamente"
        );

        return redirect("/clients")->with('messageResult', $messageResult);
    }
}
