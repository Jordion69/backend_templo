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
        Schema::create('conciertos_pasados', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('concierto_original_id')->unsigned();
            $table->string('nombre');
            $table->string('imagen');
            $table->string('alt_imagen');
            $table->string('banda_principal');
            $table->text('sala');
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('provincia');
            $table->date('fecha_evento');
            $table->text('link_entrada')->nullable();
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
        Schema::dropIfExists('conciertos_pasados');
    }
};
