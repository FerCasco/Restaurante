<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.


    //Cuando creemos un objeto de este tipo, crearemos una nueva mesa
    public function up(): void
    {
        Schema::create('unionMesas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idMesa");
            $table->foreign("idMesa")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idMesa");
            $table->foreign("idMesa")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('unionMesas');

    }     */
};
