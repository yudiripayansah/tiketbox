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
      $table->integer('id_user')->nullable();
      $table->text('email');
      $table->text('phone');
      $table->text('name');
      $table->text('gender')->nullable();
      $table->date('dob')->nullable();
      $table->text('domicile')->nullable();
      $table->integer('id_promotion')->nullable();
      $table->integer('promotion_code')->nullable();
      $table->integer('promotion_type')->nullable();
      $table->integer('promotion_value')->nullable();
      $table->integer('promotion_amount')->nullable();
      $table->integer('total_items');
      $table->integer('total_amount');
      $table->text('payment_id')->nullable();
      $table->text('payment_method')->nullable();
      $table->text('payment_status')->nullable();
      $table->text('payment_description')->nullable();
      $table->date('payment_date')->nullable();
      $table->text('status')->nullable();
      $table->text('description')->nullable();
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
