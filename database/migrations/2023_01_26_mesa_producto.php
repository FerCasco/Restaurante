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
        Schema::create('mesa_productos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idMesa");
            $table->foreign("idMesa")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idProductos");
            $table->foreign("idProductos")->on("productos")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesa_productos');
    }
};
