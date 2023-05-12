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
        Schema::create('elaboracionesMercancias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idMercancia");
            $table->foreign("idMercancia")->on("mercancias")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->decimal("cantidadMercancia");

            $table->unsignedBigInteger("idElaboracion");
            $table->foreign("idElaboracion")->on("elaboraciones")->references("id")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elaboracionesMercancias');
    }
};
