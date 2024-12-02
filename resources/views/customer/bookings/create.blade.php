<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <!-- Form Container -->
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create a New Booking</h1>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Booking Form -->
        <form action="{{ route('customer.bookings.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Route Selection -->
            <div>
                <label for="route_id" class="block text-sm font-medium text-gray-700">Select Route:</label>
                <select id="route_id" name="route_id" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Choose a route</option>
                    @foreach ($routes as $route)
                        <option value="{{ $route->id }}">
                            {{ $route->pickup_location }} to {{ $route->dropoff_location }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Number of Seats -->
            <div>
                <label for="seat_count" class="block text-sm font-medium text-gray-700">Number of Seats:</label>
                <input type="number" id="seat_count" name="seat_count" min="1" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter number of seats">
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 focus:ring-2 focus:ring-green-300">
                    Create Booking
                </button>
            </div>
        </form>
    </div>

</body>
</html>
