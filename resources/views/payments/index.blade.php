<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Payments</title>
</head>
<body class="bg-gray-100 p-10">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">Payments</h1>

        <a href="{{ route('payments.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Record a new Payment
        </a>

        <ul class="space-y-4">
            @foreach ($payments as $payment)
                <li class="p-4 bg-white rounded-lg shadow-md">
                    <p class="mb-2">
                        <strong>Booking ID:</strong> {{ $payment->booking->id }},
                        <strong>Amount:</strong> ${{ $payment->amount }},
                        <strong>Status:</strong> {{ $payment->status }}
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ route('payments.edit', $payment->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-4 rounded">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
