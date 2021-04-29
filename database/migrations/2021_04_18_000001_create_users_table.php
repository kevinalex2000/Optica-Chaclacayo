<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('dni')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_rol')
                    ->references('id')
                    ->on('rols')
                    ->onDelete('set null');
        });

        DB::table("users")
        ->insert([
            "name" => "Administrator",
            "username" => "admin",
            "id_rol" => 1, // Administrador
            "password" => '$2y$10$VBKBZHyT2R4hM.Zya7wRP.AjHdAE3kqZUcYSCORJuzUXiqlSJlpdK', // 12345678 Codificado
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
