<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('event_tickets', function (Blueprint $table) {
      $table->id();
      $table->integer('id_event');
      $table->text('image')->nullable();
      $table->text('name');
      $table->integer('quota');
      $table->integer('price');
      $table->text('tax')->nullable();
      $table->integer('tax_amount')->nullable();
      $table->date('date_start')->nullable();
      $table->date('date_end')->nullable();
      $table->time('time_start')->nullable();
      $table->time('time_end')->nullable();
      $table->text('description')->nullable();
      $table->text('status')->nullable();
      $table->text('type')->nullable();
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
    Schema::dropIfExists('event_tickets');
  }
}
