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
        Schema::create('mercancias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->decimal("cantidadActual");
            $table->decimal("stockMin")->nullable();
            $table->decimal("stockMax")->nullable();
            $table->unsignedBigInteger("idTipos");
            $table->foreign("idTipos")->on("tipos")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->decimal("precioUnidad");
            $table->unsignedBigInteger("idProveedor");
            $table->foreign("idProveedor")->on("proveedores")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mercancias');

    }
};
