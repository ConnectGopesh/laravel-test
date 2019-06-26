<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name')->index();
			$table->bigInteger('hotel_details_id')->unsigned()->index()->nullable();
			$table->bigInteger('room_type_id')->unsigned()->index()->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
			$table->softDeletes();
            $table->foreign('hotel_details_id')->references('id')->on('hotel_details');
			$table->foreign('room_type_id')->references('id')->on('room_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
