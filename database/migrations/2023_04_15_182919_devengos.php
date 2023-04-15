<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devengos', function (Blueprint $table) {
            $table->id();
            $table->decimal("salarioBase");
            $table->decimal("complementoSalariales");//Debería ser una tabla
            $table->decimal("complementoAjuste");
            $table->decimal("horasExtras");
            $table->decimal("incentivos");
            $table->decimal("pagasExtra");
            $table->decimal("plusTransporte");
            $table->decimal("plusProductividad");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devengos');

    }
};
