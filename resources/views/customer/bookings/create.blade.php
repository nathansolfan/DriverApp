<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Create a New Booking</h1>

        <!-- Error Message Section -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-md">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Booking Form -->
        <form action="{{ route('customer.bookings.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="route_id" class="block text-sm font-medium text-gray-700">Select Route:</label>
                <select id="route_id" name="route_id" class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($routes as $route)
                        <option value="{{ $route->id }}">{{ $route->pickup_location }} to {{ $route->dropoff_location }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="seat_count" class="block text-sm font-medium text-gray-700">Number of Seats:</label>
                <input type="number" id="seat_count" name="seat_count" min="1" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <button type="submit" class="bg-green-600 text-white w-full py-2 rounded-md hover:bg-green-700">Create Booking</button>
        </form>
    </div>
</body>
</html>
