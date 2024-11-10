<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Analytics Dashboard</h1>

        <!-- Time Frame Filter Form -->
        <form method="GET" action="{{ route('analytics.index') }}" class="mb-4">
            <label for="time_frame">Time Frame:</label>
            <select name="time_frame" id="time_frame" onchange="this.form.submit()">
                <option value="current_month" {{$timeFrame == 'current_month' ? 'selected' : ''}} >Current Month</option>
                <option value="last_month" {{$timeFrame == 'last_month' ? 'selected' : ''}} >Last Month</option>
                <option value="all_time" {{$timeFrame == 'all_time' ? 'selected' : ''}} >All Time</option>


            </select>

        </form>



        <div class="row my-4">
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Routes</h5>
                        <p class="card-text">{{ $totalRoutes }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Bookings</h5>
                        <p class="card-text">{{ $bookingsPerRoute->sum('bookings_count') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Payments Received</h5>
                        <p class="card-text">${{ number_format($totalPayments, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h2>Total Number of Routes <small data-bs-toggle="tooltip" title="This chart shows the total payments received by the system.">ℹ️</small> </h2>
        <canvas id="totalRoutesChart"></canvas>

        <h2>Number of Bookings Per Route</h2>
        <canvas id="bookingsPerRouteChart"></canvas>

        <h2>Total Payments Received</h2>
        <canvas id="totalPaymentsChart"></canvas>

    </div>

    <script>
        // Total Number of Routes
        var totalRoutesCtx = document.getElementById('totalRoutesChart').getContext('2d');
        var totalRoutesChart = new Chart(totalRoutesCtx, {
            type: 'bar',
            data: {
                labels: ['Total Routes'],
                datasets: [{
                    label: '# of Routes',
                    data: [{{ $totalRoutes }}],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Number of Bookings Per Route
        var bookingsPerRouteCtx = document.getElementById('bookingsPerRouteChart').getContext('2d');
        var bookingsPerRouteLabels = {!! json_encode($bookingsPerRoute->pluck('pickup_location')->toArray()) !!};
        var bookingsPerRouteData = {!! json_encode($bookingsPerRoute->pluck('bookings_count')->toArray()) !!};
        var bookingsPerRouteChart = new Chart(bookingsPerRouteCtx, {
            type: 'bar',
            data: {
                labels: bookingsPerRouteLabels,
                datasets: [{
                    label: '# of Bookings',
                    data: bookingsPerRouteData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Total Payments Received
        var totalPaymentsCtx = document.getElementById('totalPaymentsChart').getContext('2d');
        var totalPaymentsChart = new Chart(totalPaymentsCtx, {
            type: 'bar',
            data: {
                labels: ['Total Payments'],
                datasets: [{
                    label: 'Payments Amount',
                    data: [{{ $totalPayments }}],
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    </script>
</body>
</html>
