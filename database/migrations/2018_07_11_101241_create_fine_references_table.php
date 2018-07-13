<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine', function (Blueprint $table) {
            $table->foreign('fine_shop_id')->references('id')->on('fine_shop')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fine', function (Blueprint $table) {
            $table->dropForeign(['fine_shop_id']);
            $table->dropForeign(['order_id']);
        });
    }
}
