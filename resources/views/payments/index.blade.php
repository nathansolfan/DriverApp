<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payments</title>
</head>
<body>
    <h1>Payments</h1>
    <a href=" {{route('payments.create')}} ">Record a new Payment</a>
    <ul>
        @foreach ( $payments as $payment )
        <li>Booking ID: {{$payment->booking->id}}, Amount: {{$payment->amount}}, Status: {{$payment->status}}
            <a href=" {{route('payments.edit', $payment->id)}} ">Edit</a>
            <form action=" {{route('payments.destroy')}} " method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </li>

        @endforeach
    </ul>

</body>
</html>
