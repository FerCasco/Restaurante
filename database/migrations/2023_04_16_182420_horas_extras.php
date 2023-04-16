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
        Schema::create('horasExtras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idTrabajador");
            $table->foreign("idTrabajador")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->decimal("tiempo");
            $table->date("fecha");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horasExtras');

    }
};
