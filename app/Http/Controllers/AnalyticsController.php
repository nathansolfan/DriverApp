<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Route;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        // Default time frame is the current month
        $timeFrame = $request->input('time_frame', 'current_month');

        // Get total number of routes - count() built in php function
        $totalRoutes = Route::count();

        // Get total number of bookings > Eloquent ORM
        $bookingsPerRoute = Route::withCount('bookings')->get();

        // get total paymentss
        $totalPayments = Payment::sum('amount');

        return view('analytics.index', compact('totalRoutes', 'bookingsPerRoute', 'totalPayments'));
    }
}
