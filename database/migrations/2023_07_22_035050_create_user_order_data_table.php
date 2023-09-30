<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrderDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order_data', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->text('email');
            $table->text('phone');
            $table->text('name');
            $table->text('nik')->nullable();
            $table->text('gender')->nullable();
            $table->date('dob')->nullable();
            $table->text('domicile')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('user_order_data');
    }
}
