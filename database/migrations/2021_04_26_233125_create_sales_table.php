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
            $table->unsignedBigInteger("id_product");
            $table->unsignedBigInteger("id_user")->nullable();
            $table->unsignedBigInteger("id_office")->nullable();
            $table->string("code")->unique()->nullable();
            $table->float("total");
            $table->date("date_sale");
            $table->timestamps();
            $table->foreign('id_product')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
            $table->foreign('id_client')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('set null');
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
        Schema::dropIfExists('sales');
    }
}
