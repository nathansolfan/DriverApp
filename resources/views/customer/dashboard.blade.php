<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Customer Dashboard</title>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header with Logout Button -->
    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <h1 class="text-2xl font-bold">Customer Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Logout</button>
        </form>
    </header>

    <!-- Main Content -->
    <main class="flex items-center justify-center mt-8">
        <div class="w-full max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-8 text-center">Welcome to Your Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Bookings Card -->
                <a href="{{ route('customer.bookings') }}" class="bg-green-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center transition transform hover:scale-105">
                    <h2 class="text-xl font-bold mb-4">My Bookings</h2>
                    <p class="text-3xl">View Your Bookings</p>
                </a>

                <!-- Create Booking Card -->
                <a href="{{ route('customer.bookings.create') }}" class="bg-blue-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center transition transform hover:scale-105">
                    <h2 class="text-xl font-bold mb-4">Book a Route</h2>
                    <p class="text-3xl">Create a New Booking</p>
                </a>

            </div>
        </div>
    </main>

</body>
</html>
