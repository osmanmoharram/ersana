<x-app-layout>
    @section('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    @endsection

    <x-slot name="header">
        {{ __('page.dashboard.header') }}
    </x-slot>

    <div>
        <x-label for="calendar" value="Calendar" />

        <div id="calendar" class="pb-12"></div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap5'
                });
                calendar.render();
            });
        </script>
    @endsection
</x-app-layout>


