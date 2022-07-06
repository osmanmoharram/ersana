<x-app-layout>
    @section('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    @endsection

    <x-slot name="header">
        {{ __('page.dashboard.header') }}
    </x-slot>

    <div class="grid grid-cols-4 gap-x-6">
        <div class="col-span-1 bg-blue-400 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.revenues.all') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $revenues }}
            </div>
        </div>
        <div class="col-span-1 bg-green-400 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.revenues.collected') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $collected_revenues }}
            </div>
        </div>
        <div class="col-span-1 bg-purple-400 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.revenues.uncollected') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $uncollected_revenues }}
            </div>
        </div>
        <div class="col-span-1 bg-red-400 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.expenses') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $expenses }}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-x-6 mt-4">
        <div class="col-span-1 bg-sky-300 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.bookings.all') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $bookings }}
            </div>
        </div>
        <div class="col-span-1 bg-teal-300 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.bookings.confirmed') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $temporary_bookings }}
            </div>
        </div>
        <div class="col-span-1 bg-indigo-300 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.bookings.temporary') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $confirmed_bookings }}
            </div>
        </div>
        <div class="col-span-1 bg-pink-300 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.bookings.canceled') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $paid_bookings }}
            </div>
        </div>
        <div class="col-span-1 bg-orange-300 text-white rounded-sm shadow-sm">
            <div class="flex items-center h-10 px-3">
                {{ __('page.dashboard.cards.bookings.paid') }}
            </div>
            <hr>
            <div class="h-20 flex items-center text-3xl px-3">
                {{ $canceled_bookings }}
            </div>
        </div>
    </div>

    <div id="calendar" class="p-6 bg-white border-t-8 border-yellow-400 rounded-sm mt-4"></div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    timezone: 'local',
                    events: {!! $events !!}
                });
                calendar.render();
            });
        </script>
    @endsection
</x-app-layout>


