<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->OnDelete();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->OnDelete();

            $table->integer('shift_id')->unsigned()->nullable();
            $table->foreign('shift_id')->references('id')->on('shifts')->OnDelete();

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
        Schema::dropIfExists('bookings');
    }
}
