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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titular_inicial');
            $table->string('texto_inicial');
            $table->string('foto_inicio');
            $table->text('alt_foto_inicio');
            $table->string('titular');
            $table->text('texto1');
            $table->text('texto2')->nullable();
            $table->text('texto3')->nullable();
            $table->text('texto4')->nullable();
            $table->text('link_video')->nullable();
            $table->string('headline')->nullable();
            $table->text('text1')->nullable();
            $table->text('text2')->nullable();
            $table->text('text3')->nullable();
            $table->text('text4')->nullable();
            $table->string('palabras_clave')->nullable();
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
        Schema::dropIfExists('noticias');
    }
};
