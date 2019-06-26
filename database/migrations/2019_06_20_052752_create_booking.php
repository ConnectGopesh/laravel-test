<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('room_id')->unsigned()->index()->nullable();
			$table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
			$table->string('full_name')->index();
			$table->string('email')->index();
			$table->string('phone')->index();
			$table->integer('total_nights')->nullable();
			$table->integer('total_prices')->nullable();
			$table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->timestamps();
			$table->softDeletes();
			$table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
