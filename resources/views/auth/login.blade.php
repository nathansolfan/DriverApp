<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css') <!-- If you want styling from your app -->
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

        <!-- Error Message Section -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-md">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" name="password" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded-md hover:bg-blue-700">Login</button>
        </form>
    </div>

</body>
</html>
