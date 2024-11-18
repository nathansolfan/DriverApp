<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header with Logout Button -->
    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Logout</button>
        </form>
    </header>

    <!-- Main Content -->
    <main class="flex items-center justify-center mt-8">
        <div class="w-full max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-8 text-center">Interactive Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Total Routes Card -->
                <a href="{{ route('routes.index') }}" class="bg-blue-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center transition transform hover:scale-105">
                    <h2 class="text-xl font-bold mb-4">Total Routes</h2>
                    <p class="text-3xl">{{ $totalRoutes }} Routes</p>
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

                <a href="{{ route('bookings.calendar') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-center">View Booking Calendar</a>
            </div>
        </div>
    </main>

</body>
</html>
