<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware('auth:web')->resource('hotel-details','HotelDetailsController', ['except' => [
	'create', 'store', 'destroy'
]]);

Route::middleware('auth:web')->resource('room-type','RoomTypeController');

Route::middleware('auth:web')->resource('rooms','RoomsController');

Route::middleware('auth:web')->resource('prices','RoomPricesController');

Route::middleware('auth:web')->resource('customers','CustomerController');

Route::middleware('auth:web')->resource('bookings','BookingController');

Route::middleware('auth:web')->get('booking-calendar','BookingController@BookingCalendarView');

Route::middleware('auth:web')->get('bookings-json','BookingController@BookingCalendarViewJson');

