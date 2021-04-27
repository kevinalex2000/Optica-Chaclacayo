<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_states', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->string("leyend");
            $table->timestamps();
        });
        
        DB::table("appointment_states")
        ->insert([
            [
                "description" => "Atendido",
                "leyend" => "success"
            ],
            [
                "description" => "En espera",
                "leyend" => "info"
            ],
            [
                "description" => "Caducado",
                "leyend" => "warning"
            ],
            [
                "description" => "Cancelado",
                "leyend" => "danger"
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_states');
    }
}
