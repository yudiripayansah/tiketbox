<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('order_items', function (Blueprint $table) {
      $table->id();
      $table->date('date');
      $table->integer('id_order');
      $table->integer('id_event');
      $table->integer('id_ticket');
      $table->integer('id_seat')->nullable();
      $table->text('section')->nullable();
      $table->text('row')->nullable();
      $table->text('seat')->nullable();
      $table->integer('price');
      $table->integer('amount');
      $table->integer('total');
      $table->text('description')->nullable();
      $table->text('status')->nullable();
      $table->integer('updated_by')->nullable();
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
    Schema::dropIfExists('order_items');
  }
}
