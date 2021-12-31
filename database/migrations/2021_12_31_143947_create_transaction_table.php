<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->char('keyboard_name', 60);
            $table->unsignedBigInteger('sub_price', false);
            $table->integer('quantity');
            $table->timestamp('date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
