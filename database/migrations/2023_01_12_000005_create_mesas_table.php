<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer("capacidad")->default(4);
            $table->integer("ocupado(sillas)")->default(0);
            $table->boolean("reservado")->default(false);
            $table->time("hora_reserva");
            $table->integer("id_mesa_unida");
            $table->unsignedBigInteger("sala_id");
            $table->foreign("sala_id")->on("salas")->references("id")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('mesas');
    }
}
