<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kostum')->unsigned();
            $table->foreign('id_kostum')->references('id')->on('kostum');
            $table->integer('id_sewa')->unsigned();
            $table->foreign('id_sewa')->references('id')->on('sewa');
            $table->integer('id_detail_bayar')->unsigned();
            $table->foreign('id_detail_bayar')->references('id')->on('detail_bayar');
            $table->float('nilai_rating');
            $table->date('tgl_rating');
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
        Schema::dropIfExists('rating');
    }
}
