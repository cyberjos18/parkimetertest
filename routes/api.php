<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('bookings',['as'=>'bookings','uses'=>'Bookings\BookingsController@CreateBooking']);
Route::get('bookings/{reserveId}',['as'=>'bookings','uses'=>'Bookings\BookingsController@BookingList']);
