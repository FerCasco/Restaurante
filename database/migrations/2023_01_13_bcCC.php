<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.

    public function up(): void
    {
        Schema::create('bcCC', function (Blueprint $table) {
            $table->id();

            $table->decimal("salarioBruto");// campo totalDevengo -> tabla Devengos
            $table->decimal("complementosSalariales"); // campo totalComplementoSalariales -> tabla ComplementoSalariales
            $table->decimal("pagasExtras"); // en caso de se prorrateada (2xsalario/diaX30)/365

            $table->decimal("CNsiContizan"); //tabla de cotiza CS //SIN HACER -> UNA TABLA

            //sb+CS+(PE/6 ó 0 y se añade la PE en mes)+CNS si cotizan
            $table->decimal("totalBcCC");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('bcCC');

    }     */
};
