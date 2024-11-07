<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('booking')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookings = Booking::all();
        return view('payments.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|string|max:50',
        'payment_date' => 'required|date',
        ]);
        Payment::create($validated);
        return redirect()->route('payments.index')->with('success', 'Payments recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        $bookings = Booking::all();
        return view('payments.edit', compact('payment', 'bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|string|max:50',
        'payment_date' => 'required|date',
        ]);
        $payment = Payment::findOrFail($id);
        $payment->update($validated);
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route()->with('success', 'Payment deleted successfully');
    }
}
