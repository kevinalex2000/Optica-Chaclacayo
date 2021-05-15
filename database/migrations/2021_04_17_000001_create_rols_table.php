<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('leyend');
            $table->timestamps();
        });

        DB::table("rols")
        ->insert([
            [
                "name" => "Administrador",
                "description" => "Permisos para registrar, actualizar y eliminar",
                "leyend" => "info"
            ],
            [
                "name" => "Asistente de ventas",
                "description" => "Permisos para registrar y actualizar",
                "leyend" => "success"
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }
}
