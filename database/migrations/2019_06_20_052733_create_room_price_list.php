<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPriceList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_price_list', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('room_type_id')->unsigned()->index()->nullable();
			$table->integer('price')->nullable();
			$table->timestamps();
			$table->softDeletes();
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
        Schema::dropIfExists('room_price_list');
    }
}
