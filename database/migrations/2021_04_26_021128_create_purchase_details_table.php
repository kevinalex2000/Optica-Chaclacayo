<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_product");
            $table->unsignedBigInteger("id_purchase")->nullable();
            $table->float("price");
            $table->integer("quantity");
            $table->float("total");
            $table->timestamps();
            $table->foreign('id_product')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
            $table->foreign('id_purchase')
                    ->references('id')
                    ->on('purchases')
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
        Schema::dropIfExists('purchase_details');
    }
}
