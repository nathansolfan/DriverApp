<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Interactive Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Total Routes Card -->
            <a href="{{ route('routes.index') }}" class="bg-blue-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center transition transform hover:scale-105">
                <h2 class="text-xl font-bold mb-4">Total Routes</h2>
                <p class="text-3xl">{{ $totalRoutes }}</p>
            </a>

            <!-- Total Bookings Card -->
            <a href="{{ route('bookings.index') }}" class="bg-green-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center transition transform hover:scale-105">
                <h2 class="text-xl font-bold mb-4">Total Bookings</h2>
                <p class="text-3xl">{{ $totalBookings }}</p>
            </a>

            <!-- Total Payments Card -->
            <a href="{{ route('payments.index') }}" class="bg-yellow-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center transition transform hover:scale-105">
                <h2 class="text-xl font-bold mb-4">Total Payments Received</h2>
                <p class="text-3xl">${{ number_format($totalPayments, 2) }}</p>
            </a>

        </div>
    </div>

</body>
</html>
