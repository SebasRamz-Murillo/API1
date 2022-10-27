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
        Schema::create('monstruo_objetos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monstruo');
            $table->foreign('monstruo')->references('id')->on('monstruos');
            $table->unsignedBigInteger('objeto');
            $table->foreign('objeto')->references('id')->on('objetos');
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
        Schema::dropIfExists('monstruo_objetos');
    }
};
