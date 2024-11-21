<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Route;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $user = $request->user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Unauthorized Access');
    }

    // Admin Dashboard
    if ($user->role === 'admin') {
        $totalRoutes = Route::count();
        $totalBookings = Booking::count();
        $totalPayments = Payment::sum('amount');

        return view('dashboard', compact('totalRoutes', 'totalBookings', 'totalPayments'));
    }

    // Customer Dashboard
    if ($user->role === 'customer') {
        // Fetch relevant data for the customer, such as their bookings
        $customerBookings = Booking::where('user_id', $user->id)->with('route')->get();

        return view('customer.dashboard', compact('customerBookings'));
    }

    return redirect()->route('login')->with('error', 'Unauthorized Access');
}

}
