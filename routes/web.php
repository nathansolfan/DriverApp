<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Define resource routes for routes, bookings, and payments
Route::resource('routes', RouteController::class);
Route::resource('bookings', BookingController::class);
Route::resource('payments', PaymentController::class);
