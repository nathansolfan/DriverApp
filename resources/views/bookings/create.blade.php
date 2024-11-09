<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
</head>
<body>
    <h1>Create a New Booking</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <!-- Route Selection -->
        <div>
            <label for="route_id">Select Route:</label>
            <select id="route_id" name="route_id" required>
                @foreach ($routes as $route)
                    <option value="{{ $route->id }}">{{ $route->pickup_location }} to {{ $route->dropoff_location }} ({{ $route->schedule_time }})</option>
                @endforeach
            </select>
            @error('route_id')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Seat Count -->
        <div>
            <label for="seat_count">Number of Seats:</label>
            <input type="number" id="seat_count" name="seat_count" min="1" required>
            @error('seat_count')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="confirmed" required>
            @error('status')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Create Booking</button>
    </form>
</body>
</html>
