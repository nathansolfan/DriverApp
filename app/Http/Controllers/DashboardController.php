<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Route;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRoutes = Route::count();
        $totalBookings = Booking::count();
        $totalPayments = Payment::sum('amount');

        return view('dashboard', compact('totalRoutes', 'totalBookings', 'totalPayments'));
    }
}
