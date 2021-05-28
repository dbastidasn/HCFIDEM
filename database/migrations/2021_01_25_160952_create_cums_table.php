<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cums', function (Blueprint $table) {
            $table->Increments('id_cums');
            $table->string('cums',45);
            $table->string('invima',100);
            $table->string('nombre_medto',255);
            $table->string('descripcion_medto',255);
            $table->string('unidad',45);
            $table->string('unidad_referencia',200);
            $table->string('via_administracion',100);
            $table->string('unidad_medida',45);
            $table->string('cantidad',45);
            $table->string('forma_farmaceutica',45);
            $table->string('observacion',200)->nullable();
            $table->string('cantidad_cum',255)->nullable();
            $table->char('estado',1);
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
        Schema::dropIfExists('cums');
    }
}
