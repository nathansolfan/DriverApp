<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookings</title>
</head>
<body>
    <h1>Bookings</h1>
    <a href=" {{route('bookings.create')}} ">Create Booking</a>
    <ul>
        @foreach ($bookings as $booking )
        <li>User: {{$booking->user->name}}, Route: {{$booking->route->pickup_location}} to {{$booking->route->dropoff_location}}
            <a href=" {{route('bookings.edit', $booking->id)}} ">Edit</a>
            <form action=" {{route('bookings.destroy', $booking->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
