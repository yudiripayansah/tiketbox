<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('promotions', function (Blueprint $table) {
      $table->id();
      $table->integer('id_event')->nullable();
      $table->integer('target_event')->nullable();
      $table->text('name');
      $table->text('code');
      $table->text('type');
      $table->integer('quota');
      $table->integer('minimum_amount');
      $table->text('discount_type');
      $table->integer('amount_percent')->nullable();
      $table->integer('amount_rupiah')->nullable();
      $table->integer('maximum_discount')->nullable();
      $table->text('description')->nullable();
      $table->text('available_days')->nullable();
      $table->text('available_dates')->nullable();
      $table->date('date_start')->nullable();
      $table->date('date_end')->nullable();
      $table->time('time_start')->nullable();
      $table->time('time_end')->nullable();
      $table->text('status')->nullable();
      $table->integer('is_bestdeal')->nullable();
      $table->integer('is_popular')->nullable();
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
    Schema::dropIfExists('promotions');
  }
}
