<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Bookings</title>
</head>
<body class="bg-gray-100 min-h-screen p-8">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">

         <!-- Breadcrumbs -->
         @include('components.breadcrumbs', ['breadcrumbs' => Breadcrumbs::generate('bookings.index')])

        <div class="flex justify-between mb-6">
            <a href="{{ route('routes.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                Back to Routes
            </a>
            <a href="{{ route('bookings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Create Booking
            </a>

            <button onclick="window.print()" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Print to PDF
            </button>
        </div>

        <h1 class="text-2xl font-bold mb-6">Bookings</h1>


        <!-- Search Form -->
        <form method="GET" action="{{ route('bookings.index') }}" class="flex items-center mb-4 space-x-4">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by user name"
                class="border rounded-md px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">

            <select name="status" class="border rounded-md px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Filter by Status</option>
                <option value="pending" {{ $filterStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $filterStatus == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $filterStatus == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Search</button>
        </form>

        <!-- Bookings List -->
        <ul class="space-y-4">
            @forelse ($bookings as $booking)
                <li class="bg-gray-200 p-4 rounded-md shadow-sm flex justify-between items-center">
                    <div>
                        <p><strong>User:</strong> {{ $booking->user->name }}</p>
                        <p><strong>Route:</strong> {{ $booking->route->pickup_location }} to {{ $booking->route->dropoff_location }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="bg-green-600 text-white px-4 py-2 rounded-md">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-gray-500">No bookings found</li>
            @endforelse
        </ul>
    </div>

</body>
</html>
