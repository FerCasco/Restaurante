<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comandas', function (Blueprint $table) {
            $table->id();
            $table->time("hora");
            $table->unsignedBigInteger("idMesa");
            $table->foreign("idMesa")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //necesario?? ya está el num de comensales en la mesa
            $table->integer("comensales");

            $table->unsignedBigInteger("idTrabajador");
            $table->foreign("idTrabajador")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idProducto");
            $table->foreign("idProducto")->on("productos")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("cantidad");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comandas');
    }
};
