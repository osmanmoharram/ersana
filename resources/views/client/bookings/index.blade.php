<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.bookings.index.header') }}

        <!-- begin::Add -->
        <x-actions.add href="{{ route('halls.bookings.create', session('hall')->id) }}" />
        <!-- end::Add -->
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="bookings" :columns="['#', 'customer', 'date', 'from', 'to', 'total', 'status']">
        @foreach ($bookings as $booking)
            <tr>
                <!-- begin::Slug -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->id}}
                    </div>
                </td>
                <!-- end::Slug -->

                <!-- begin::Customer -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->customer_name }}
                    </div>
                </td>
                <!-- end::Customer -->

                <!-- begin::Date -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ \Illuminate\Support\Carbon::parse($booking->date)->toFormattedDateString() }}
                    </div>
                </td>
                <!-- end::Date -->

                <!-- begin::From -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->bookingTime->from }}
                    </div>
                </td>
                <!-- end::From -->

                <!-- begin::To -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->bookingTime->to }}
                    </div>
                </td>
                <!-- end::To -->

                <!-- begin::Total -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs {{ app()->getLocale() === 'ar' ? 'text-right' : '' }} text-slate-500">
                        {{ number_format($booking->total, 2) }}
                    </div>
                </td>
                <!-- end::Total -->

                <!-- begin::Status -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs {{ app()->getLocale() === 'ar' ? 'text-right' : '' }} text-slate-500">
                        {{ __('page.bookings.form.status.items.' . $booking->status) }}
                    </div>
                </td>
                <!-- end::Status -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-xs space-s-1 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('halls.bookings.edit', ['hall' => session('hall')->id, 'booking' => $booking->id]) }}"/>
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete action="{{ route('halls.bookings.destroy', ['hall' => session('hall')->id, 'booking' => $booking->id]) }}"/>
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $bookings->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-app-layout>
