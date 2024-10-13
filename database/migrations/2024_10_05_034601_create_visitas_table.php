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
        Schema::create('visitas', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' automáticamente
            $table->integer('ID_Visita', true);
            $table->integer('ID_Visitante')->nullable()->index('ID_Visitante');
            $table->dateTime('Fecha_Hora_Entrada');
            $table->dateTime('Fecha_Hora_Salida')->nullable();
            $table->string('Propósito')->nullable();
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
        Schema::dropIfExists('visitas');
    }
};
