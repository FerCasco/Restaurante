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
        Schema::create('lineas_factura', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idTicket");
            $table->foreign("idTicket")->on("tickets")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idFactura");
            $table->foreign("idFactura")->on("facturas")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_factura');
    }
};
