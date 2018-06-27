<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('city');
            $table->string('district');
            $table->string('country');
            $table->longText('description');
            $table->string('image');
<<<<<<< HEAD
            $table->string('phone');
=======
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
            $table->tinyInteger('status');
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
        Schema::dropIfExists('shops');
    }
}
