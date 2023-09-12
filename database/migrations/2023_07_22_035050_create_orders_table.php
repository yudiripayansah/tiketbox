<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('order_code');
            $table->integer('id_user');
            $table->text('email');
            $table->text('phone');
            $table->text('name');
            $table->text('gender');
            $table->date('dob');
            $table->text('domicile');
            $table->integer('total_items');
            $table->integer('total_amount');
            $table->text('payment_id')->nullable();
            $table->text('payment_method');
            $table->text('payment_status');
            $table->text('payment_description');
            $table->date('payment_date');
            $table->text('status');
            $table->text('description');
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
        Schema::dropIfExists('orders');
    }
}
