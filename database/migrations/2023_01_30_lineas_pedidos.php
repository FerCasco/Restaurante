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
        Schema::create('lineas_pedidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idProveedor");
            $table->foreign("idProveedor")->on("proveedores")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idMercancia");
            $table->foreign("idMercancia")->on("mercancias")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idPedido");
            $table->foreign("idPedido")->on("pedido")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("cantidad");
            $table->integer("precioUnidad");
            $table->integer("precioTotal");

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_pedidos    ');
    }
};
