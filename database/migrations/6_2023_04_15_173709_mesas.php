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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer("capacidad");
            $table->integer("comensales")->default(0);

            //No aparecían en el esquema de bd y creo q no deben desaparecer
            $table->boolean("reservado")->default(false);
            $table->dateTime("fechaReserva");
            $table->boolean("unir");//para indicar q es el tipo de mesa q se puede juntar con otras

            /*$table->unsignedBigInteger("idCamarero");
            $table->foreign("idCamarero")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");
            */
            $table->unsignedBigInteger("idSala");
            $table->foreign("idSala")->on("salas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
