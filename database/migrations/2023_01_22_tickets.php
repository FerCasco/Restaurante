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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("idLineasComandas");
            $table->foreign("idLineasComandas")->on("lineas_comandas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //Campos solo para la comanda.
            $table->time("hora"); //Para generar la comanda. Para saber cuanto tiempo hace que se pidió la comanda.

            //Campos solo para el ticket.
            $table->string("fechaTicket");
            $table->integer("precioTotal");
            $table->unsignedBigInteger("idTrabajador");//Este trabajador va a ser la persona que cree una comanda primero.
            $table->foreign("idTrabajador")->on("trabajadores")->references("id")->onDelete("cascade")->onUpdate("cascade");

            //En los tickets hay que poner la información del restaurante, que también podríamos ponerla en una tabla nueva por si cambia algo tipo la localización o así.

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
