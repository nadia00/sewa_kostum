<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detail_sewa')->unsigned();
            $table->foreign('id_detail_sewa')->references('id')->on('detail_sewa');
            $table->integer('id_jenis')->unsigned();
            $table->foreign('id_jenis')->references('id')->on('jenis_pembayaran');
            $table->date('batas_bayar');
            $table->date('tgl_bayar');
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
        Schema::dropIfExists('pembayaran');
    }
}
