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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idLineasFactura");
            $table->foreign("idLineasFactura")->on("lineasFactura")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idEmpresas");
            $table->foreign("idEmpresas")->on("empresas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //Aquí también tendríamos que poner la información del restaurante.
            $table->string("fechaFactura");
            $table->integer("total");
            $table->timestamps();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
