<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger("idRol");
            $table->foreign("idRol")->on("roles")->references("id")->onDelete("cascade")->onUpdate("cascade");

            $table->string("apellidos");
            $table->string("telefono");
            $table->string("dni");
            $table->string("codigoQr");//res_qr_(idPersona)_(codigoContrato)
            $table->binary("imagenQr");//blob
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
