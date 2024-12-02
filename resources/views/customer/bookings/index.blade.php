<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-6xl mx-auto py-12 px-6 sm:px-8">
            <!-- Title -->
            <div class="border-b border-gray-200 pb-6 mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Your Bookings</h1>
                <p class="text-sm text-gray-500 mt-2">Review and manage your current bookings.</p>
            </div>

            <!-- Bookings List -->
            <ul class="space-y-4">
                @forelse ($bookings as $booking)
                    <li class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                        <p class="text-lg font-semibold text-gray-800">
                            {{ $booking->route->pickup_location }} to {{ $booking->route->dropoff_location }}
                        </p>
                        <p class="text-sm text-gray-500">Seats: {{ $booking->seat_count }}</p>
                        <p class="text-sm text-gray-500">Status:
                            <span class="px-2 py-1 rounded-full text-white
                                {{ $booking->status === 'active' ? 'bg-green-500' : 'bg-gray-500' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </p>
                    </li>
                @empty
                    <li class="text-gray-500 text-center">No bookings found.</li>
                @endforelse
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4">
        <div class="max-w-6xl mx-auto text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </footer>

</body>
</html>
