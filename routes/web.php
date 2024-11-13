<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RouteController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [DashboardController::class, 'index']);

// Define resource routes for routes, bookings, and payments
Route::resource('routes', RouteController::class);
Route::resource('bookings', BookingController::class);
Route::resource('payments', PaymentController::class);

// Analytics Route
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

// Calendar Route

Route::get('/calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');
