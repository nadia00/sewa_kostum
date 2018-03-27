<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id')->on('role');
            $table->integer('id_alamat')->unsigned();
            $table->foreign('id_alamat')->references('id')->on('alamat');
            $table->string('email', 200);
            $table->string('username', 200);
            $table->string('password', 200);
            $table->string('password_e', 200);
            $table->string('telp', 20);
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
        Schema::dropIfExists('user');
    }
}
