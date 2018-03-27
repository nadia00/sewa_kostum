<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jasa')->unsigned();
            $table->foreign('id_jasa')->references('id')->on('jasa');
            $table->integer('id_penyewa')->unsigned();
            $table->foreign('id_penyewa')->references('id')->on('penyewa');
            $table->date('tgl_sewa');
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
        Schema::dropIfExists('sewa');
    }
}
