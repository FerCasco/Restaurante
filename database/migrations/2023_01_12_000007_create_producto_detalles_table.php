<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("producto_id");
            $table->foreign("producto_id")->on("productos")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("cantidad");
            $table->string("manipulacion");
            $table->decimal("precio");
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
        Schema::dropIfExists('producto_detalles');
    }
}
