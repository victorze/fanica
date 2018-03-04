<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tipo_doc', 2);
            $table->char('numeracion', 13); // F###-NNNNNNNN
            $table->integer('cliente_id')->unsigned();
            $table->char('tipo_moneda', 3);
            $table->double('tasa_igv', 1, 2);
            $table->string('guia_remision', 15)->nullable();
            $table->double('porcentaje_detraccion', 1, 2)->nullable();
            $table->double('porcentaje_percepcion', 1, 2)->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('facturas');
    }
}
