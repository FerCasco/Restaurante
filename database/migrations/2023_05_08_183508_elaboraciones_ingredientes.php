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
        Schema::create('elaboracionesIngredientes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idIngredientes");
            $table->foreign("idIngredientes")->on("ingredientes")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idElaboraciones");
            $table->foreign("idElaboraciones")->on("elaboraciones")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
