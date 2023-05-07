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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");// se Relaciona con las elaboraciones en función de su nombre
            //$table->foreign("nombre")->on("elaboraciones")->references("nombre")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idFamilia");
            $table->foreign("idFamilia")->on("familias")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->string("descripcion");
            $table->string("tipo");
            $table->decimal("precio");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('res_productos');

    }
};
