<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id', false);
            $table->unsignedBigInteger('keyboard_id', false);
            $table->primary(['user_id', 'keyboard_id']);
            $table->integer('quantity');
            $table->foreign('user_id')->references('id')
                    ->on('users');
            $table->foreign('keyboard_id')->references('id')
                    ->on('keyboard');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
}
