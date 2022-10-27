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
        Schema::create('mision_monstruos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mision');
            $table->foreign('mision')->references('id')->on('misions');
            $table->unsignedBigInteger('monstruo');
            $table->foreign('monstruo')->references('id')->on('monstruos');
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
        Schema::dropIfExists('mision_monstruos');
    }
};
