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
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();

            //Encabezado
            $table->string("grupoProfesional");//la función que desempeña
            $table->string("grupoCotizaciones");//salario en el que intervalo se encuentra
            $table->string("numAfiliacionSS");// num de alta en la SS
            $table->date("fechaContratacion");
            $table->string("codigoContrato");//Indica el tipo de contrato, si es indefinido,...->CREAR TABLA CONTRATO QUE RELACIONE COD CON EL TIPO

            //Crear tabla restaurante
            $table->unsignedBigInteger("idEmpresa");
            $table->foreign("idEmpresa")->on("empresas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idTrabajador");
            $table->foreign("idTrabajador")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //Periodo de liquidación
            $table->string("periodoLiquidacion");//fecha de inicio-fecha de fin/->total de días

            //Devengos
            $table->unsignedBigInteger("idDevengo");
            $table->foreign("idDevengo")->on("Devengos")->references("id")->onDelete("cascade")->onUpdate("cascade");


            //Deducciones
            $table->unsignedBigInteger("idDeduccion");
            $table->foreign("idDeduccion")->on("Deducciones")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->decimal("totalTrabajador");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('nominas');

    }*/
};
