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
        Schema::create('teloneros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('concierto_id')->unsigned();
            $table->string('telonero');
            $table->timestamps();
            $table->foreign('concierto_id')->references('id')->on('conciertos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teloneros');
    }
};
