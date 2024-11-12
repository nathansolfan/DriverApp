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

    <div class="w-full max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Routes Card -->
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-xl font-bold mb-4">Routes</h2>
                <a href="{{ route('routes.index') }}" class="bg-white text-blue-600 py-2 px-4 rounded-md font-semibold hover:bg-gray-100 transition">
                    View Routes
                </a>
            </div>

            <!-- Bookings Card -->
            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-xl font-bold mb-4">Bookings</h2>
                <a href="{{ route('bookings.index') }}" class="bg-white text-green-600 py-2 px-4 rounded-md font-semibold hover:bg-gray-100 transition">
                    View Bookings
                </a>
            </div>

            <!-- Payments Card -->
            <div class="bg-yellow-600 text-white p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-xl font-bold mb-4">Payments</h2>
                <a href="{{ route('payments.index') }}" class="bg-white text-yellow-600 py-2 px-4 rounded-md font-semibold hover:bg-gray-100 transition">
                    View Payments
                </a>
            </div>
        </div>
    </div>

</body>
</html>
