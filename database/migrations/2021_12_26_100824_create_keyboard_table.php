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
            $table->char('category', 50);
            $table->char('name', 60);
            $table->bigInteger('price');
            $table->text('description');
            $table->char('image', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('keyboard');
    }
}
