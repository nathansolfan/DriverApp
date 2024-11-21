<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RouteController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;


// Set home route to show the home view
Route::get('/', function () {
    return view('home');
})->name('home');


// Admin Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Customer Dashboard
Route::get('/customer/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');


// Define resource routes for routes, bookings, and payments for ADMIN
Route::resource('routes', RouteController::class);
Route::resource('bookings', BookingController::class);
Route::resource('payments', PaymentController::class);

// Analytics Route
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

// Calendar Route
Route::get('/calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');

// CUSTOMER REGISTRATION ROUTE
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Customer-specific routes
Route::get('/customer/bookings', [BookingController::class, 'customerBookings'])->name('customer.bookings');
Route::post('/customer/bookings', [BookingController::class, 'storeBooking'])->name('customer.bookings.store');
Route::get('/customer/bookings/create', [BookingController::class, 'createCustomerBooking'])->name('customer.bookings.create'); // Route to create a booking form for customers
