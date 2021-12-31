<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyboardTable extends Migration
{
    public function up()
    {
        Schema::create('keyboard', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->autoIncrement(false);
            $table->char('name', 60);
            $table->unsignedBigInteger('price')->autoIncrement(false);
            $table->text('description');
            $table->char('image', 100);
            $table->foreign('category_id')
                  ->references('id')
                  ->on('category')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('keyboard');
    }
}
