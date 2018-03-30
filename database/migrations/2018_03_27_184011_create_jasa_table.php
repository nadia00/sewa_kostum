<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_alamat')->unsigned();
            $table->foreign('id_alamat')->references('id')->on('alamat');
            $table->string('email', 50)->unique();
            $table->string('username', 50)->unique();
            $table->string('password', 200);
            $table->string('telp', 20);
            $table->string('nama_jasa', 100)->nullable();
            $table->string('nama_pemilik', 100)->nullable();
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
        Schema::dropIfExists('jasa');
    }
}
