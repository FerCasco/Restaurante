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
        Schema::create('comandas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idComanda");
            $table->foreign("idComanda")->on("comandas")->references("id")->onDelete("cascade")->onUpdate("cascade");


            //para q? en comanda ya tienes la mesa atendida
            $table->unsignedBigInteger("idMesa");
            $table->foreign("idMesa")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->integer('comensales');// ya en mesa
            //en comanda ya tienes el camarero que ha atendidp
            $table->unsignedBigInteger("idCamarero");
            $table->foreign("idCamarero")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->decimal('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineasFacturas');

    }
};
