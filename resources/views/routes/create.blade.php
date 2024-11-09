<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Route</title>
</head>
<body>
    <h1>Create a New Route</h1>

    <form action="{{ route('routes.store') }}" method="POST">
        @csrf
        <div>
            <label for="pickup_location">Pickup Location:</label>
            <input type="text" id="pickup_location" name="pickup_location" required>
            @error('pickup_location')
            <span style="color: red;"> {{$message}} </span>
            @enderror
        </div>
        <div>
            <label for="dropoff_location">Dropoff Location:</label>
            <input type="text" id="dropoff_location" name="dropoff_location" required>
        </div>
        <div>
            <label for="schedule_time">Schedule Time:</label>
            <input type="datetime-local" id="schedule_time" name="schedule_time" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>
        </div>
        <button type="submit">Create Route</button>
    </form>
</body>
</html>
