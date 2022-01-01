<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->char('name', 60);
            $table->char('image', 40)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category');
    }
}
