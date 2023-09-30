<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->text('username');
      $table->text('email');
      $table->text('name');
      $table->text('password');
      $table->text('phone');
      $table->text('image')->nullable();
      $table->text('address')->nullable();
      $table->text('gender')->nullable();
      $table->date('dob')->nullable();
      $table->text('domicile')->nullable();
      $table->text('status')->nullable();
      $table->text('type');
      $table->text('promotor_logo')->nullable();
      $table->text('promotor_banner')->nullable();
      $table->text('promotor_name')->nullable();
      $table->text('promotor_link')->nullable();
      $table->text('promotor_phone')->nullable();
      $table->text('promotor_email')->nullable();
      $table->text('promotor_address')->nullable();
      $table->text('promotor_about')->nullable();
      $table->text('promotor_social_media')->nullable();
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
    Schema::dropIfExists('users');
  }
}
