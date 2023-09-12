<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('username');
            $table->text('email');
            $table->text('name');
            $table->text('password');
            $table->text('phone');
            $table->text('image')->nullable();
            $table->text('address')->nullable();
            $table->text('gender')->nullable();
            $table->date('dob')->nullable();
            $table->text('domicile')->nullable();
            $table->text('status')->nullable();
            $table->text('type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
