<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <title>Booking Calendar View</title>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center">Booking Calendar View</h1>

        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                events: [
                    @foreach ($bookings as $booking)
                        {
                            title: '{{ $booking->user->name }} ({{ ucfirst($booking->status) }})',
                            start: '{{ $booking->route->schedule_time }}',
                            url: '{{ route('bookings.edit', $booking->id) }}',
                        },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
