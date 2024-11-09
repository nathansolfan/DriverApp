<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Analytics Dashboard</h1>

    <h2>Total Number of Routes</h2>
    <canvas id="totalRoutesChart"></canvas>

    <h2>Number of Bookings Per Route</h2>
    <canvas id="bookingsPerRouteChart"></canvas>

    <h2>Total Payments Received</h2>
    <canvas id="totalPaymentsChart"></canvas>

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
