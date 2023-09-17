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
            $table->integer('target_event');
            $table->text('name');
            $table->text('code');
            $table->text('type');
            $table->integer('quota');
            $table->integer('minimum_amount');
            $table->text('discount_type');
            $table->integer('amount_percent')->nullable();
            $table->integer('amount_rupiah')->nullable();
            $table->integer('maximum_discount');
            $table->text('description')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->time('time_start');
            $table->time('time_end');
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
        Schema::dropIfExists('promotions');
    }
}
