<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_order")->nullable();
            $table->unsignedBigInteger("id_form_category")->nullable();
            $table->string('value')->nullable();
            $table->foreign('id_form_category')
                    ->references('id')
                    ->on('form_categories')
                    ->onDelete('set null');
            $table->foreign('id_order')
                    ->references('id')
                    ->on('orders')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
