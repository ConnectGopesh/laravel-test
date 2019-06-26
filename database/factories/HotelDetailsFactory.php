<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\HotelDetails;
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

$factory->define(HotelDetails::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
		'address' =>  $faker->address,
		'city' =>  $faker->city,
		'state' =>  $faker->state,
		'country' =>  $faker->country,
		'zip_code' =>  $faker->randomDigit,
		'phone' => $faker->phoneNumber,
		'email' => $faker->unique()->safeEmail,
		'image' => $faker->imageUrl('100', '100', 'cats', true, ''),
    ];
});
