<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // R E G I S T E R
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // add role - default Customer
            'role' => 'customer'
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'User created');
    }

    // L O G I N
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validate the login request
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Determine the user's role and redirect accordingly
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'You are now logged in as admin.');
        } elseif ($user->role === 'customer') {
            return redirect()->route('customer.dashboard')->with('success', 'You are now logged in as a customer.');
        }
    }

    // Return back with error if login failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
