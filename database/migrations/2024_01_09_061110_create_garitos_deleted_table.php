<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garitos_deleted', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_garito');
            $table->string('nombre_duenyo');
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('provincia');
            $table->integer('codigo_postal');
            $table->string('comunidad_autonoma');
            $table->string('telefono')->nullable();
            $table->string('telefono2')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->string('mail')->nullable();
            $table->string('frase')->nullable();
            $table->string('sentence')->nullable();
            $table->boolean('visitado');
            $table->integer('ratio_colaboracion')->nullable();
            $table->text('imagen');
            $table->text('alt_imagen');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('tendencia')->nullable();
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
        Schema::dropIfExists('garitos_deleted');
    }
};
