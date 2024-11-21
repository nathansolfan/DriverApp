<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Welcome to DriverApp</h1>

        <div class="flex flex-col space-y-4">
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="bg-blue-600 text-white text-center py-2 rounded-md hover:bg-blue-700">
                Login
            </a>
            <!-- Register Button -->
            <a href="{{ route('register') }}" class="bg-green-600 text-white text-center py-2 rounded-md hover:bg-green-700">
                Register
            </a>
        </div>
    </div>

</body>
</html>
