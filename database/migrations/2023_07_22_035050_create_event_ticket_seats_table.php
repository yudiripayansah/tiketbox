<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_ticket_seats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_event');
            $table->integer('id_ticket');
            $table->text('image');
            $table->text('section');
            $table->text('row');
            $table->integer('seat');
            $table->integer('price');
            $table->text('status');
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
        Schema::dropIfExists('event_ticket_seats');
    }
}
