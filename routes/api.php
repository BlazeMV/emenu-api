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

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::post('customer/register', 'CustomerController@register');

Route::middleware('auth')->group(function () {
    Route::middleware('customer')->group(function () {
        Route::get('bookings', 'CustomerController@myBookings');
        Route::post('booking', 'CustomerController@bookTable');
    });

    Route::middleware('employee')->group(function () {});

    Route::group([], function () {
        Route::get('cafes', 'CafeController@all');
        Route::get('cafe/{id}/menu', 'CafeController@menu');
        Route::get('cafe/{id}/tables', 'CafeController@tables');
    });
});
