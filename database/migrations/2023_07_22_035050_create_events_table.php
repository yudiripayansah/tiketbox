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
            $table->integer('id_user')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('name');
            $table->text('powered_by')->nullable();
            $table->text('powered_by_image')->nullable();
            $table->text('category');
            $table->text('subcategory');
            $table->text('keyword')->nullable();
            $table->text('is_public');
            $table->text('is_offline');
            $table->text('days_closed')->nullable();
            $table->text('dates_closed')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->text('location_name');
            $table->text('location_address');
            $table->text('location_city');
            $table->text('location_coordinate')->nullable();
            $table->text('description')->nullable();
            $table->text('toc')->nullable();
            $table->text('form_order')->nullable();
            $table->integer('max_ticket');
            $table->text('one_email_one_transaction')->nullable();
            $table->text('one_ticket_one_order')->nullable();
            $table->text('peduli_lindungi')->nullable();
            $table->text('holiday')->nullable();
            $table->text('holidate')->nullable();
            $table->text('status')->nullable();
            $table->text('type')->nullable();
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
        Schema::dropIfExists('events');
    }
}
