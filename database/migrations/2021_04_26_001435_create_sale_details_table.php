<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_product");
            $table->unsignedBigInteger("id_sale")->nullable();
            $table->float("price");
            $table->integer("quantity");
            $table->float("total");
            $table->timestamps();
            $table->foreign('id_product')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
            $table->foreign('id_sale')
                    ->references('id')
                    ->on('sales')
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
        Schema::dropIfExists('sale_details');
    }
}
