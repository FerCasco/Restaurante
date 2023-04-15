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
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idEmpresa");
            $table->foreign("idEmpresa")->on("empresas")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idTrabajador");
            $table->foreign("idTrabajador")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idDevengo");
            $table->foreign("idDevengo")->on("Devengos")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idDeduccion");
            $table->foreign("idDeduccion")->on("Deducciones")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->decimal("totalTrabajador");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominas');

    }
};
