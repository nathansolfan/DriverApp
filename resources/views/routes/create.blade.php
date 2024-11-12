<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Create Route</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Create a New Route</h2>

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

        <!-- Form for Creating a Route -->
        <form action="{{ route('routes.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Pickup Location Field -->
            <div>
                <label for="pickup_location" class="block text-sm font-medium text-gray-700">Pickup Location</label>
                <input type="text" id="pickup_location" name="pickup_location" value="{{ old('pickup_location') }}"
                    class="w-full mt-1 px-4 py-2 border @error('pickup_location') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">

                @error('pickup_location')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Dropoff Location Field -->
            <div>
                <label for="dropoff_location" class="block text-sm font-medium text-gray-700">Dropoff Location</label>
                <input type="text" id="dropoff_location" name="dropoff_location" value="{{ old('dropoff_location') }}"
                    class="w-full mt-1 px-4 py-2 border @error('dropoff_location') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">

                @error('dropoff_location')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Schedule Time Field -->
            <div>
                <label for="schedule_time" class="block text-sm font-medium text-gray-700">Schedule Time</label>
                <input type="datetime-local" id="schedule_time" name="schedule_time" value="{{ old('schedule_time') }}"
                    class="w-full mt-1 px-4 py-2 border @error('schedule_time') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">

                @error('schedule_time')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status Field -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="w-full mt-1 px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>

                @error('status')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring focus:border-blue-700">
                    Create Route
                </button>
            </div>
        </form>
    </div>

</body>
</html>
