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
        Schema::create('bcCC', function (Blueprint $table) {
            $table->id();

            $table->
            $table->decimal("salarioBruto");// campo totalDevengo -> tabla Devengos
            $table->decimal("complementosSalariales"); // campo totalComplementoSalariales -> tabla ComplementoSalariales
            $table->decimal("pagasExtras"); // en caso de se prorrateada (2xsalario/diaX30)/365
            $table->decimal("pagasExtras");//Hay que tener en cuenta el salario min base/ 2 pagas extras al año (opcion entre prorrateada o no)/ si se desea meter paga de benificio(suele ser en marzo en base a un % de beneficios)

            //sb+CS+(PE/6 ó 0 y se añade la PE en mes)+CNS si cotizan
            $table->decimal("totalBcCC");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bcCC');

    }
};
