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
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idElaboracion");
            $table->foreign("idElaboracion")->on("elaboraciones")->references("id")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("idMercancia");
            $table->foreign("idMercancia")->on("mercancias")->references("id")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('ingredientes');
    }
};
