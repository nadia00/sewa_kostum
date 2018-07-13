<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineShopReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine_shop', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shop')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('fine_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fine_shop', function (Blueprint $table) {
            $table->dropForeign(['shop_id']);
            $table->dropForeign(['type_id']);
        });
    }
}
