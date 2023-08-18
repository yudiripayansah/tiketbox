<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('powered_by');
            $table->text('powered_by_image');
            $table->text('category');
            $table->text('subcategory');
            $table->text('keyword');
            $table->text('is_public');
            $table->text('is_offline');
            $table->date('date_start');
            $table->date('date_end');
            $table->time('time_start');
            $table->time('time_end');
            $table->text('location_name');
            $table->text('location_address');
            $table->text('location_city');
            $table->text('location_coordinate');
            $table->text('description');
            $table->text('toc');
            $table->text('form_order');
            $table->integer('max_ticket');
            $table->text('one_email_one_transaction');
            $table->text('one_ticket_one_order');
            $table->text('peduli_lindungi');
            $table->text('status');
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
        Schema::dropIfExists('events');
    }
}
