<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Edit Booking</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Booking</h2>

        <!-- Success and Error Flash Messages -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form for Editing a Booking -->
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Route Selection -->
            <div>
                <label for="route_id" class="block text-sm font-medium text-gray-700">Select Route:</label>
                <select id="route_id" name="route_id" required
                    class="w-full mt-1 px-4 py-2 border @error('route_id') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($routes as $route)
                        <option value="{{ $route->id }}" {{ $booking->route_id == $route->id ? 'selected' : '' }}>
                            {{ $route->pickup_location }} to {{ $route->dropoff_location }} ({{ $route->schedule_time }})
                        </option>
                    @endforeach
                </select>
                @error('route_id')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Seat Count -->
            <div>
                <label for="seat_count" class="block text-sm font-medium text-gray-700">Number of Seats:</label>
                <input type="number" id="seat_count" name="seat_count" min="1" required value="{{ old('seat_count', $booking->seat_count) }}"
                    class="w-full mt-1 px-4 py-2 border @error('seat_count') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">
                @error('seat_count')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                <select id="status" name="status" class="w-full mt-1 px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring focus:border-blue-700">
                    Update Booking
                </button>
            </div>
        </form>
    </div>

</body>
</html>
