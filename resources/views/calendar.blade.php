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
        <!-- Page Title -->
        <h1 class="text-3xl font-bold mb-8 text-center">Booking Calendar View</h1>

        <!-- Breadcrumbs -->
        <nav class="text-sm font-medium mb-4">
            @include('components.breadcrumbs', ['breadcrumbs' => Breadcrumbs::generate()])
        </nav>

        <!-- Calendar Container -->
        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            // Initialize FullCalendar
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day'
                },
                events: [
                    @foreach ($bookings as $booking)
                        {
                            title: '{{ $booking->user->name }} ({{ ucfirst($booking->status) }})',
                            start: '{{ $booking->route->schedule_time }}',
                            url: '{{ route('bookings.edit', $booking->id) }}',
                            extendedProps: {
                                pickup: '{{ $booking->route->pickup_location }}',
                                dropoff: '{{ $booking->route->dropoff_location }}',
                                status: '{{ $booking->status }}'
                            },
                            color: '{{ $booking->status === "confirmed" ? "green" : ($booking->status === "pending" ? "orange" : "red") }}'
                        },
                    @endforeach
                ],
                eventDidMount: function(info) {
                    // Tooltip for event
                    var tooltipContent = `
                        <strong>Pickup:</strong> ${info.event.extendedProps.pickup}<br>
                        <strong>Dropoff:</strong> ${info.event.extendedProps.dropoff}<br>
                        <strong>Status:</strong> ${info.event.extendedProps.status}
                    `;
                    var tooltip = new Tooltip(info.el, {
                        title: tooltipContent,
                        html: true,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                },
                eventClick: function(info) {
                    // Stop redirection if URL is present and use it for confirmation
                    info.jsEvent.preventDefault();
                    if (info.event.url) {
                        if (confirm('Do you want to edit this booking?')) {
                            window.location.href = info.event.url;
                        }
                    }
                }
            });

            // Render the calendar
            calendar.render();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tooltip.js/dist/umd/tooltip.min.js"></script>
</body>
</html>
