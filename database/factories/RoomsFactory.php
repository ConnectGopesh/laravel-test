<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Rooms;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Rooms::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify('Room #'),
		'hotel_details_id' => $faker->randomElement(
            App\HotelDetails::pluck('id')->toArray()
        ),
		'room_type_id' => $faker->randomElement(
            App\RoomType::pluck('id')->toArray()
        ),
		'image' => $faker->imageUrl('250', '250', 'cats', true, ''),
    ];
});
