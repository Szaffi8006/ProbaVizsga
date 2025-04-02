<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/cars', [App\Http\Controllers\CarController::class, 'getCars']);
Route::post('/cars', [App\Http\Controllers\CarController::class, 'addCar']);
Route::put('/cars/{id}', [App\Http\Controllers\CarController::class, 'modCar']);
Route::delete('/cars/{id}', [App\Http\Controllers\CarController::class, 'delCar']);

Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'getBookings']);
