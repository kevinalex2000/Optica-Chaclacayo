<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_client")->nullable();
            $table->unsignedBigInteger("id_product")->nullable();
            $table->unsignedBigInteger("id_office")->nullable();
            $table->unsignedBigInteger("id_user")->nullable();
            $table->integer("quantity")->nullable();
            $table->boolean("is_delivered")->default(0);
            $table->date("date_delivered")->nullable();
            $table->float("prepayment")->nullable();
            $table->foreign('id_client')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('set null');
            $table->foreign('id_product')
                    ->references('id')
                    ->on('products')
                    ->onDelete('set null');
            $table->foreign('id_office')
                    ->references('id')
                    ->on('offices')
                    ->onDelete('set null');
            $table->foreign('id_user')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
