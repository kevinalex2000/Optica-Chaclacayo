<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_client")->nullable();
            $table->string("code")->unique()->nullable();
            $table->string("description")->nullable();
            $table->boolean("is_delivered")->default(0);
            $table->boolean("date_delivered")->nullable();
            $table->timestamps();
            $table->foreign('id_client')
                    ->references('id')
                    ->on('clients')
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
        Schema::dropIfExists('sales');
    }
}
