<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Routes</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-6 text-center">Routes Management</h1>

        @if (session('success'))
            <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ session('error') }}</p>
        @endif

        <div class="mb-6">
            <a href="{{ route('routes.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Create a new Route</a>
            <a href="{{ route('bookings.index') }}" class="inline-block bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mb-4">Go to Bookings</a>
            <a href="{{ route('payments.index') }}" class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mb-4">Go to Payments</a>
            <a href="{{ route('analytics.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mb-4">Go to Analytics</a>
        </div>

        <ul class="space-y-4">
            @foreach ($routes as $route)
                <li class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-lg font-semibold">{{ $route->pickup_location }} to {{ $route->dropoff_location }}</p>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('routes.edit', $route->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('routes.destroy', $route->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
