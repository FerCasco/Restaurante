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
        Schema::create('complementoSalariales', function (Blueprint $table) {
            $table->id();

            $table->decimal("complementosPersonales");//antigüedad,plus de idiomas,posesión de títulos
            $table->decimal("complementosPuestoTrabajo");//plus peligrosidad, toxicidad, nocturnidad, atención al público, convenio
            $table->decimal("complementosCantidad");//incentivos, primas, comisiones, plus de asistencia y puntualidad, horas extras

            //se calcula a través del campo salarioBase de tabla Devengos
            $table->decimal("pagasExtras");//salario base/ 2 pagas extras al año (opcion entre prorrateada o no)/ si se desea meter paga de benificio(suele ser en marzo en base a un % de beneficios)

            //se calcula con la suma de todos los campos de esta tabla en un registro concreto
            $table->decimal("totalComplementoSalariales");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('complementoSalariales');
    }
*/
};
