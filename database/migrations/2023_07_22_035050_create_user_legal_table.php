<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLegalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_legal', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->text('ktp_image');
            $table->text('ktp_name');
            $table->text('ktp_no');
            $table->text('ktp_address');
            $table->text('npwp_image');
            $table->text('npwp_name');
            $table->text('npwp_no');
            $table->text('npwp_address');
            $table->text('type')->nullable();
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
        Schema::dropIfExists('user_legal');
    }
}
