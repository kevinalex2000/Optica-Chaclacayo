<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->string("name");
            $table->string("trademark")->nullable();
            $table->string("material")->nullable();
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->integer("stock_initial");
            $table->integer("stock");
            $table->float("price");
            $table->boolean("is_enabled")->default(1);
            $table->unsignedBigInteger("id_category")->nullable();
            $table->timestamps();
            $table->foreign('id_category')
                    ->references('id')
                    ->on('categories')
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
        Schema::dropIfExists('products');
    }
}
