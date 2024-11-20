<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Bookings</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Your Bookings</h1>

        <ul class="space-y-4">
            @forelse ($bookings as $booking)
                <li class="bg-gray-200 p-4 rounded-md shadow-sm">
                    <p><strong>Route:</strong> {{ $booking->route->pickup_location }} to {{ $booking->route->dropoff_location }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                    <p><strong>Seats:</strong> {{ $booking->seat_count }}</p>
                </li>
            @empty
                <li class="text-gray-500">No bookings found.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
