<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Booking;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;
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

$factory->define(Booking::class, function (Faker $faker) {
	$startDate = $faker->dateTimeBetween('+5 days', '+45 days');
    $endDate = date('Y-m-d H:i:s', strtotime($startDate->format('Y-m-d H:i:s') . ' + 7 days'));
	$start = Carbon::parse($startDate);
	$end = Carbon::parse($endDate);		
	$totalNights = $start->diffInDays($end);
		
	$fullName = $faker->firstName." ".$faker->lastName;
    return [
        'room_id' => $faker->randomElement(
            App\Rooms::pluck('id')->toArray()
        ),
		'start_date' => $startDate,
		'end_date' => $endDate,
		'full_name' => $fullName,
		'email' => $faker->unique()->safeEmail,
		'phone' => $faker->phoneNumber,
		'total_nights'=> $totalNights,
		'total_prices'=> $faker->randomDigit,
		'user_id' => $faker->randomElement(
            App\User::pluck('id')->toArray()
        ),
    ];
});
