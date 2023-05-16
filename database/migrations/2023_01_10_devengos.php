<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.


    //salario bruto
    public function up(): void
    {
        Schema::create('devengos', function (Blueprint $table) {
            $table->id();

            $table->decimal("salarioBase");

            //Percepciones salariales
            $table->unsignedBigInteger("idComplementoSalariales");
            $table->foreign("idComplementoSalariales")->on("complementoSalariales")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //Percepciones no salariales/extrasalariales
            $table->decimal("plusTransporteUrbano");
            $table->decimal("plusDistancia");
            $table->decimal("dietas");
            $table->decimal("locomoción");//kilometraje
            $table->decimal("ropaTrabajoDesgasteHerramientas");
            $table->decimal("quebrantoMoneda");

            //Percepciones salariales + Percepciones no salariales/extrasalariales
            $table->decimal("totalDevengo");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('devengos');

    }     */
};
