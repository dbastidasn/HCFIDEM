<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('monto');
            $table->integer('monto_pendiente')->nullable();
            $table->string('tipo_pago', 50);
            $table->integer('cuotas');
            $table->integer('numero_cuota')->nullable();
            $table->integer('cuotas_pendientes')->nullable();
            $table->decimal('interes',15,2);
            $table->decimal('monto_total',15,2);
            $table->decimal('valor_cuota',15,2);
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->string('observacion',100)->nullable();
            $table->char('activo',1);
            $table->string('latitud', 100)->nullable();
            $table->string('longitud',100)->nullable();            
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('usuario_id', 'fk_prestamoid_usuarioid')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('cliente_id', 'fk_prestamoid_clienteid')->references('id')->on('cliente')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('prestamo');
    }
}
