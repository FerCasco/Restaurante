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
        Schema::create('deducciones', function (Blueprint $table) {
            $table->id();

            //Apotaciones a SS /-> Cont. Comunes+Desempleo+FP+HE

                //Cont. Comunes = 4.7% x bcCC
                $table->unsignedBigInteger("idBcCC");
                $table->foreign("idBcCC")->on("idBcCC")->references("id")->onDelete("cascade")->onUpdate("cascade");

                //Desempleo =  porc. x bcCP
                $table->decimal("porcentajeDesempleo");//contratos indefi,relevo,pract,interi:1,55 ó tempo:1,6
                $table->decimal("bcCP");//bsCC (campo totalContigenciasComunes -> tabla ContigenciasComunes) + HE ( campo tiempo -> tabla horasExtras)

                //FP =0,1x bcCP
                $table->decimal("Desempleo");

                //BCHE = HE
                $table->decimal("bcHE");//campo tiempo -> tabla horasExtras

                $table->decimal("totalSS");

            //IRPF /-> Birpf x porcent.
            $table->decimal("birpf");// campo totalDevengo - CNS
            $table->decimal("porcentIrpf");
            $table->decimal("totalIRPF");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deducciones');

    }
};
