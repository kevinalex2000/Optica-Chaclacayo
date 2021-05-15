<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_category")->nullable();
            $table->string("field")->nullable();
            $table->string("type")->nullable();
            $table->string("values")->nullable();
            $table->timestamps();
            $table->foreign('id_category')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('set null');
        });

        DB::table("form_categories")
        ->insert([
            // Lentes de Contacto
            [
                "id_category" => 1,
                "field" => "tratamiento",
                "type" => "select",
                "values" => "optico&cosmetico"
            ],
            // Lentes de Sol
            [
                "id_category" => 2,
                "field" => "tratamiento",
                "type" => "select",
                "values" => "polarizado&espejados"
            ],
            // Lentes Oftálmicos
            [
                "id_category" => 3,
                "field" => "tipo",
                "type" => "select",
                "values" => "monofocal&bifocal&multifocal"
            ],
            [
                "id_category" => 3,
                "field" => "tratamiento",
                "type" => "select",
                "values" => "antireflex&alto indice&reduccion de diametro&coloriado&fotocromaticos&claros&proteccion de luz azul"
            ],
            [
                "id_category" => 3,
                "field" => "material",
                "type" => "select",
                "values" => "policarbonato&cristal"
            ],
            [
                "id_category" => 3,
                "field" => "control",
                "type" => "select",
                "values" => "3 meses&8 meses&1 año"
            ],
            [
                "id_category" => 4,
                "field" => "nota adicional",
                "type" => "text",
                "values" => NULL
            ],
            [
                "id_category" => 5,
                "field" => "nota adicional",
                "type" => "text",
                "values" => NULL
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_categories');
    }
}
