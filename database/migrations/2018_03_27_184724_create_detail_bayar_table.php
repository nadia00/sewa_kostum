<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bayar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bayar')->unsigned();
            $table->foreign('id_bayar')->references('id')->on('bayar');
            $table->integer('id_tipe')->unsigned();
            $table->foreign('id_tipe')->references('id')->on('tipe_bayar');
            $table->integer('status_bayar');
            $table->integer('biaya_kirim');
            $table->integer('total_bayar');
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
        Schema::dropIfExists('detail_bayar');
    }
}
