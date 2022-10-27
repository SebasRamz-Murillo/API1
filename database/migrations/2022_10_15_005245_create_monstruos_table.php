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
        Schema::create('monstruos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',50);
            $table->string('especie',50);
            $table->string('nombre',50);
            $table->string('descripcion',300);
            $table->string('debilidades',100);
            $table->string('habitats',300);
            $table->string('tamaño',20);
            $table->string('parientes',300);
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
        Schema::dropIfExists('monstruos');
    }
};
