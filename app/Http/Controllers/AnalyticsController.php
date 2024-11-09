<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Route;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Get total number of routes - count() built in php function
        $totalRoutes = Route::count();

        // Get total number of bookings > Eloquent ORM
        $bookingsPerRoute = Route::withCount('bookings')->get();

        // get total paymentss
        $totalPayments = Payment::sum('amount');
        return view('analytics.index', compact('totalRoutes', 'bookingsPerRoute'));
    }
}
