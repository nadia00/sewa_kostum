<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKostumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kostum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->integer('id_jasa')->unsigned();
            $table->foreign('id_jasa')->references('id')->on('jasa');
            $table->string('nama', 100);
            $table->text('keterangan');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('stok');
            $table->integer('jumlah_rating');
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
        Schema::dropIfExists('kostum');
    }
}
