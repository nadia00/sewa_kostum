<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detail_sewa')->unsigned();
            $table->foreign('id_detail_sewa')->references('id')->on('detail_sewa');
            $table->string('jenis_denda', 100);
            $table->integer('harga_denda');
            $table->integer('total_denda');
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
        Schema::dropIfExists('denda');
    }
}
