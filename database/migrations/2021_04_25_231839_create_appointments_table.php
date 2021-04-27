<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("time");
            $table->string("detail");
            $table->unsignedBigInteger('id_appointment_state')->nullable()->default(2);
            $table->unsignedBigInteger("id_client");
            $table->unsignedBigInteger("id_user")->nullable();
            $table->unsignedBigInteger("id_office")->nullable();
            $table->timestamps();
            $table->foreign('id_appointment_state')
                    ->references('id')
                    ->on('appointment_states')
                    ->onDelete('set null');
            $table->foreign('id_client')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('cascade');
            $table->foreign('id_user')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');
            $table->foreign('id_office')
                    ->references('id')
                    ->on('offices')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
