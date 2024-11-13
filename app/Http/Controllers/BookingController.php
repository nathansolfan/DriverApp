<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // FETCH ALL
        // $bookings = Booking::with(['user', 'route'])->get();
        // return view('bookings.index', compact('bookings'));

        $search = $request->input('search');
        $filterStatus = $request->input('status');

        // Query for bookings
        $query = Booking::query();

        if ($search) {
            $query->whereHas('user', function ( $q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::all();
        $users = User::all();
        return view('bookings.create', compact('routes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'route_id' => 'required|exists:routes,id',
        'status' => 'required|string|max:50',
        'seat_count' => 'required|integer|min:1',
        ]);
        Booking::create($validated);
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        $routes = Route::all();
        $users = User::all();
        return view('bookings.edit', compact('booking', 'routes', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'route_id' => 'required|exists:routes,id',
        'status' => 'required|string|max:50',
        'seat_count' => 'required|integer|min:1',
        ]);
        $booking = Booking::findOrFail($id);
        $booking->update($validated);
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted with success');
    }
}
