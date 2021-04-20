<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("users")
        ->insert([
            "name" => "admin",
            "email" => "admin@admin",
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
