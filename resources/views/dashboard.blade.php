<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">Admin Dashboard</h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="border border-gray-200 bg-white rounded-md p-6 mb-8 shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800">Welcome, Admin!</h2>
                <p class="mt-2 text-sm text-gray-500">Monitor platform statistics and manage resources effectively.</p>
            </div>

            <!-- Statistics Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Routes Card -->
                <a href="{{ route('routes.index') }}" class="block bg-blue-50 border border-blue-100 rounded-md p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-blue-600">Total Routes</h3>
                    <p class="mt-2 text-2xl font-bold text-blue-700">{{ $totalRoutes }}</p>
                    <p class="text-sm text-blue-500">Manage all available routes.</p>
                </a>

                <!-- Total Bookings Card -->
                <a href="{{ route('bookings.index') }}" class="block bg-green-50 border border-green-100 rounded-md p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-600">Total Bookings</h3>
                    <p class="mt-2 text-2xl font-bold text-green-700">{{ $totalBookings }}</p>
                    <p class="text-sm text-green-500">View all customer bookings.</p>
                </a>

                <!-- Total Payments Card -->
                <a href="{{ route('payments.index') }}" class="block bg-yellow-50 border border-yellow-100 rounded-md p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-yellow-600">Total Payments</h3>
                    <p class="mt-2 text-2xl font-bold text-yellow-700">${{ number_format($totalPayments, 2) }}</p>
                    <p class="text-sm text-yellow-500">Review all payment records.</p>
                </a>
            </div>

            <!-- Actions Section -->
            <div class="mt-8 text-center">
                <a href="{{ route('bookings.calendar') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">
                    View Booking Calendar
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 mt-8">
        <div class="max-w-7xl mx-auto text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Your Company Name. All rights reserved.
        </div>
    </footer>

</body>
</html>
