<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Routes Management</title>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Title Section -->
            <div class="border-b border-gray-200 pb-6 mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Routes Management</h1>
                <p class="text-sm text-gray-500 mt-2">Manage all available routes, including editing, creating, and deleting routes.</p>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <p class="bg-green-50 text-green-800 border border-green-200 rounded-md px-4 py-3 mb-6">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="bg-red-50 text-red-800 border border-red-200 rounded-md px-4 py-3 mb-6">{{ session('error') }}</p>
            @endif

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center space-x-4 mb-8">
                <a href="{{ route('routes.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                    Create a New Route
                </a>
                <a href="{{ route('bookings.index') }}" class="px-4 py-2 bg-teal-600 text-white rounded-md shadow hover:bg-teal-700">
                    Go to Bookings
                </a>
                <a href="{{ route('payments.index') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md shadow hover:bg-purple-700">
                    Go to Payments
                </a>
                <a href="{{ route('analytics.index') }}" class="px-4 py-2 bg-yellow-600 text-white rounded-md shadow hover:bg-yellow-700">
                    Go to Analytics
                </a>
            </div>

            <!-- Routes List -->
            <ul class="space-y-4">
                @foreach ($routes as $route)
                    <li class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-semibold text-gray-800">
                                    {{ $route->pickup_location }} to {{ $route->dropoff_location }}
                                </p>
                                <p class="text-sm text-gray-500">Scheduled at: {{ $route->schedule_time }}</p>
                            </div>
                            <div class="flex space-x-4">
                                <a href="{{ route('routes.edit', $route->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('routes.destroy', $route->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4">
        <div class="max-w-7xl mx-auto text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Your Company Name. All rights reserved.
        </div>
    </footer>

</body>
</html>
