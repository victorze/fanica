<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->char('tipo', 2);
            $table->char('serie', 4);
            $table->string('correlativo', 8);
            $table->integer('cliente_id')->unsigned();
            $table->char('moneda', 3);
            $table->double('tasa_igv', 3, 2);
            $table->string('guia_remision', 15)->nullable();
            $table->double('porc_detrac', 3, 2)->nullable();
            $table->double('porc_percep', 3, 2)->nullable();

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
        Schema::dropIfExists('ventas');
    }
}
