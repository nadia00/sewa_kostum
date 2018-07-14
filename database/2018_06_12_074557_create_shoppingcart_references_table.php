<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartReferencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table("shoppingcart", function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product_sizes')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table(config('cart.database.table'), function (Blueprint $table) {
            $table->dropForeign(['user_id','shop_id','product_id']);
        });
    }
}
