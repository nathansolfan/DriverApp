<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Route</title>
</head>
<body>
    <h1>Edit Route</h1>
    <form action="{{ route('routes.update', $route->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="pickup_location">Pickup Location:</label>
            <input type="text" id="pickup_location" name="pickup_location" value="{{ $route->pickup_location }}" required>
        </div>
        <div>
            <label for="dropoff_location">Dropoff Location:</label>
            <input type="text" id="dropoff_location" name="dropoff_location" value="{{ $route->dropoff_location }}" required>
        </div>
        <div>
            <label for="schedule_time">Schedule Time:</label>
            <input type="datetime-local" id="schedule_time" name="schedule_time" value="{{ $route->schedule_time }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="{{ $route->status }}" required>
        </div>
        <button type="submit">Update Route</button>
    </form>
</body>
</html>
