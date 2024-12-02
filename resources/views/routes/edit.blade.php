<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Route</title>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

    <!-- Form Container -->
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Route</h1>

        <form action="{{ route('routes.update', $route->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Pickup Location -->
            <div>
                <label for="pickup_location" class="block text-sm font-medium text-gray-700">Pickup Location:</label>
                <input type="text" id="pickup_location" name="pickup_location" value="{{ $route->pickup_location }}" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Dropoff Location -->
            <div>
                <label for="dropoff_location" class="block text-sm font-medium text-gray-700">Dropoff Location:</label>
                <input type="text" id="dropoff_location" name="dropoff_location" value="{{ $route->dropoff_location }}" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Schedule Time -->
            <div>
                <label for="schedule_time" class="block text-sm font-medium text-gray-700">Schedule Time:</label>
                <input type="datetime-local" id="schedule_time" name="schedule_time" value="{{ $route->schedule_time }}" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                <select id="status" name="status" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue
