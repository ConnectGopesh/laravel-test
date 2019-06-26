<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 100)->index();
			$table->string('last_name', 100)->index();
			$table->string('address')->nullable();
            $table->string('city', 100)->index()->nullable();
            $table->string('country', 100)->nullable();
			$table->string('phone')->index();
			$table->string('fax')->index()->nullable();
			$table->string('email')->unique();
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
        Schema::dropIfExists('customer');
    }
}
