<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id', false);
            $table->unsignedBigInteger('keyboard_id', false);
            $table->integer('quantity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
}
