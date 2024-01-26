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
        Schema::create('teloneros_conciertos_pasados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('concierto_pasado_id')->unsigned();
            $table->string('telonero');
            $table->timestamps();
            $table->foreign('concierto_pasado_id')->references('id')->on('conciertos_pasados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teloneros_conciertos_pasados');
    }
};
