<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKostumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kostum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kostum')->unsigned();
            $table->foreign('id_kostum')->references('id')->on('kostum');
            $table->integer('id_ukuran')->unsigned();
            $table->foreign('id_ukuran')->references('id')->on('ukuran');
            $table->integer('harga');
            $table->integer('jumlah_keseluruhan');
            $table->integer('jumlah_stok');
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
        Schema::dropIfExists('detail_kostum');
    }
}
