<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Customer Dashboard</title>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-800">Customer Dashboard</h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white rounded-lg p-8 mb-8">
            <h2 class="text-3xl font-bold">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="mt-2">Manage your bookings easily from your dashboard.</p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- My Bookings -->
            <a href="{{ route('customer.bookings') }}" class="block p-6 bg-white shadow rounded-lg hover:shadow-lg hover:bg-gray-50 transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 p-4 bg-green-100 rounded-md">
                        <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-800">My Bookings</h3>
                        <p class="text-sm text-gray-500">View and manage your bookings.</p>
                    </div>
                </div>
            </a>

            <!-- Book a Route -->
            <a href="{{ route('customer.bookings.create') }}" class="block p-6 bg-white shadow rounded-lg hover:shadow-lg hover:bg-gray-50 transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 p-4 bg-blue-100 rounded-md">
                        <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-800">Book a Route</h3>
                        <p class="text-sm text-gray-500">Create a new booking.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Recent Bookings -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Bookings</h2>
            <div class="overflow-hidden rounded-lg shadow">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Route</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerBookings as $booking)
                            <tr class="border-t">
                                <td class="px-6 py-4">{{ $booking->route->name }}</td>
                                <td class="px-6 py-4">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $booking->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4">
        <div class="max-w-7xl mx-auto text-center text-gray-500">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </footer>
</body>
</html>
