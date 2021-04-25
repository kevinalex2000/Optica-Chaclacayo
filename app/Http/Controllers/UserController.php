<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::all();
        return view('user.create')->with('rols', $rols);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emailExist = User::where('email', $request->post('email'))->count();
        if($emailExist > 0){
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido crear el usuario debido que el email <b>".$request->post('email')."</b> ya esta siendo utilizado"
            );
            return redirect("/users/create")->with('messageResult', $messageResult);
        }
        $usernameExist = User::where('username', $request->post('username'))->count();
        if($usernameExist > 0){
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido crear el usuario debido que el nombre de usuario <b>".$request->post('username')."</b> ya esta siendo utilizado"
            );
            return redirect("/users/create")->with('messageResult', $messageResult);
        }

        $userExist = User::where('dni', $request->post('dni'))->count();
        $password = $request->post('password');
        $password_repeat = $request->post('password_repeat');
        // Si el usere con dni no existe o si es el mismo
        if($userExist <= 1){
            if($password != ""){
                if($password == $password_repeat){
                    $user = new User();

                    $user->dni = $request->post('dni');
                    $user->name = $request->post('name');
                    $user->lastname = $request->post('lastname');
                    $user->phone = $request->post('phone');
                    $user->address = $request->post('address');
                    $user->email = $request->post('email');
                    $user->username = $request->post('username');
                    $user->password = $request->post('password');
                    $user->id_rol = $request->post('id_rol');

                    $user->save();

                    $messageResult = array(
                        "type" => "success",
                        "message" => "<i class='fas fa-check mr-2'></i> El Usuario <b>".$request->post('name')."</b> ha sido creado exitosamente"
                    );
                }
                else{
                    $messageResult = array(
                        "type" => "warning",
                        "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> Las contraseñas no coinciden"
                    );
                }

            }
            else{
                $user = new User();

                $user->dni = $request->post('dni');
                $user->name = $request->post('name');
                $user->lastname = $request->post('lastname');
                $user->phone = $request->post('phone');
                $user->address = $request->post('address');
                $user->email = $request->post('email');
                $user->username = $request->post('username');
                $user->id_rol = $request->post('id_rol');

                $user->save();

                $messageResult = array(
                    "type" => "success",
                    "message" => "<i class='fas fa-check mr-2'></i> El Usuario <b>".$request->post('name')."</b> ha sido creado exitosamente"
                );
            }


        }else{
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido editar el usuario debido que el DNI <b>".$request->post('dni')."</b> ya esta siendo utilizado"
            );
        }

        return redirect("/users/create")->with('messageResult', $messageResult);
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
        $user = User::find($id);
        $rols = Rol::all();
        return view('user.edit')->with('data',array("User" =>$user, "Rols" => $rols));
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
        $emailExist = User::where('email', $request->post('email'))->count();
        if($emailExist > 0){
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido editar el usuario debido que el email <b>".$request->post('email')."</b> ya esta siendo utilizado"
            );
            return redirect("/users/".$id."/edit")->with('messageResult', $messageResult);
        }
        $usernameExist = User::where('username', $request->post('username'))->count();
        if($usernameExist > 0){
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido editar el usuario debido que el nombre de usuario <b>".$request->post('username')."</b> ya esta siendo utilizado"
            );
            return redirect("/users/".$id."/edit")->with('messageResult', $messageResult);
        }
        $userExist = User::where('dni', $request->post('dni'))->count();
        $password = $request->post('password');
        $password_repeat = $request->post('password_repeat');
        // Si el usere con dni no existe o si es el mismo
        if($userExist <= 1){
            if($password != ""){
                if($password == $password_repeat){
                    $user = User::find($id);

                    $user->dni = $request->post('dni');
                    $user->name = $request->post('name');
                    $user->lastname = $request->post('lastname');
                    $user->phone = $request->post('phone');
                    $user->address = $request->post('address');
                    $user->email = $request->post('email');
                    $user->username = $request->post('username');
                    $user->password = $request->post('password');
                    $user->id_rol = $request->post('id_rol');

                    $user->save();

                    $messageResult = array(
                        "type" => "success",
                        "message" => "<i class='fas fa-check mr-2'></i> El Usuario <b>".$request->post('name')."</b> ha sido editado exitosamente"
                    );
                }
                else{
                    $messageResult = array(
                        "type" => "warning",
                        "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> Las contraseñas no coinciden"
                    );
                }

            }
            else{
                $user = User::find($id);

                $user->dni = $request->post('dni');
                $user->name = $request->post('name');
                $user->lastname = $request->post('lastname');
                $user->phone = $request->post('phone');
                $user->address = $request->post('address');
                $user->email = $request->post('email');
                $user->username = $request->post('username');
                $user->id_rol = $request->post('id_rol');

                $user->save();

                $messageResult = array(
                    "type" => "success",
                    "message" => "<i class='fas fa-check mr-2'></i> El Usuario <b>".$request->post('name')."</b> ha sido editado exitosamente"
                );
            }


        }else{
            $messageResult = array(
                "type" => "warning",
                "message" => "<i class='fas fa-exclamation-triangle mr-2'></i> No se ha podido editar el usuario debido que el DNI <b>".$request->post('dni')."</b> ya esta siendo utilizado"
            );
        }

        return redirect("/users/".$id."/edit")->with('messageResult', $messageResult);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $messageResult = array(
            "type" => "danger",
            "message" => "<i class='fas fa-trash mr-2'></i> El usuario <b>".$user->name."</b> ha sido eliminado exitosamente"
        );

        return redirect("/users")->with('messageResult', $messageResult);
    }
}
