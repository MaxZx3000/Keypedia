<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id', false)->unique();
            $table->unsignedBigInteger('keyboard_id', false)->unique();
            $table->integer('quantity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
}
