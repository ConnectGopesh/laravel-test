<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name')->index()->nullable();
			$table->string('address');
            $table->string('city', 100)->index()->nullable();
			$table->string('state', 100)->index()->nullable();
            $table->string('country', 100)->nullable();
			$table->string('zip_code', 20);
			$table->string('phone')->index();
			$table->string('email')->unique();
			$table->string('image')->nullable();
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_details');
    }
}
