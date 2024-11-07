<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Notifications\RouteNotification;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('routes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'schedule_time' => 'required|date',
            'status' => 'required|string|max:255'
        ]);
        $route = Route::create($validated);
        $route->notify(new RouteNotification());
        return redirect()->route('routes.index')->with('success', 'Route created successfully');
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
        $route = Route::findOrFail($id);
        return view('routes.edit', compact('route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'schedule_time' => 'required|date',
            'status' => 'required|string|max:255'
        ]);
        $route = Route::findOrFail($id);
        $route->update($validated);
        return redirect()->route('routes.index')->with('success', 'Route updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $route = Route::findOrFail($id);
        $route->delete();
        return redirect()->route('routes.index')->with('success', 'Route deleted with success');

    }
}
