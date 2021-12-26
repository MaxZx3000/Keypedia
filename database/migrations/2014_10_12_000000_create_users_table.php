<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('username', 60);
            $table->char('email_address', 100)->unique();
            $table->char('password', 30);
            $table->text('address');
            $table->char('gender', 6);
            $table->date('date_of_birth');
            $table->char('role', 1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
