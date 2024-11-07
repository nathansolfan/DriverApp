<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routes</title>
</head>
<body>
    <h1>Routes</h1>
    <a href=" {{route('routes.create')}} ">Create a new Route</a>
    <ul>
        @foreach ($routes as $route )
        <li>{{ $route->pickup_location}} to {{ $route->dropoff_location}}
            <a href=" {{route('routes.edit', $route->id)}} ">Edit</a>
            <form action=" {{ route('routes.destroy', $route->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>

</body>
</html>
