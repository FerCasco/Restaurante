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
        Schema::create('lineas_comandas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idMesa");
            $table->foreign("idMesa")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //El trabajador que se manda en el ticket de cocina o barra será mirando el id de la comanda, la que tenga el id más alto será de la que se cogerá el trabajador.
            $table->unsignedBigInteger("idTrabajador");
            $table->foreign("idTrabajador")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idProducto");
            $table->foreign("idProducto")->on("productos")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("idTickets")->nullable();
            $table->foreign("idTickets")->on("tickets")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->double('precio');
            $table->integer("cantidad");
            $table->boolean("enviado"); //Esto se hace cuando creas una comanda pero no es necesario mandarla a cocina en ese momento.

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
        Schema::dropIfExists('lineasComandas');
    }
};
