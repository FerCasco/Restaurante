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

            $table->unsignedBigInteger("idLineasComanda");
            $table->foreign("idLineasComanda")->on("lineas_comandas")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->double('precioTotal');

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
