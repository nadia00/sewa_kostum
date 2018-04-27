<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_sewa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sewa')->unsigned();
            $table->foreign('id_sewa')->references('id')->on('detail_sewa');
            $table->integer('id_kostum')->unsigned();
            $table->foreign('id_kostum')->references('id')->on('kostum');
            $table->integer('jumlah_sewa');
            $table->string('status', 20)->nullable();
            $table->date('pengambilan');
            $table->date('pengembalian');
            $table->date('tenggang_kembali');
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
        Schema::dropIfExists('histori_sewa');
    }
}
