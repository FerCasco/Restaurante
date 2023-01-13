<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mesa_id");
            $table->unsignedBigInteger("personal_id");
            $table->unsignedBigInteger("producto_detalle_id");
            $table->foreign("mesa_id")->on("mesas")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("personal_id")->on("personals")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("producto_detalle_id")->on("producto_detalles")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->time("hora");
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
}
