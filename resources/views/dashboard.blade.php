<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <h2>Routes</h2>
    <a href=" {{route('routes.index')}} ">View Routes</a>

    <h2>Bookings</h2>
    <a href=" {{route('bookings.index')}} ">View Bookings</a>

    <h2>Payments</h2>
    <a href=" {{route('payments.index')}} ">View Payment</a>

</body>
</html>
