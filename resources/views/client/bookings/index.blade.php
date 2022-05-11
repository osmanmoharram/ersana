<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        <div class="flex items-center space-s-8">
            <span class="block">
                {{ __('page.bookings.index.header') }}
            </span>

            <!-- begin::Add -->
            <x-actions.add href="{{ route('client.bookings.create') }}" />
            <!-- end::Add -->
        </div>
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="bookings" :columns="['#', 'start', 'end', 'customer', 'type', 'price', 'status']">
        @foreach ($bookings as $booking)
            <tr>
                <!-- begin::Slug -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->slug }}
                    </div>
                </td>
                <!-- end::Slug -->

                <!-- begin::Start Date -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->start_date->format('M j, Y h:i A') }}
                    </div>
                </td>
                <!-- end::Start Date -->

                <!-- begin::End Date -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->end_date->format('M j, Y h:i A') }}
                    </div>
                </td>
                <!-- end::End Date -->

                <!-- begin::Customer -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs  text-slate-500">
                        {{ $booking->customer->name }}
                    </div>
                </td>
                <!-- end::Customer -->

                <!-- begin::Type -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs {{ app()->getLocale() === 'ar' ? 'text-right' : '' }} text-slate-500">
                        {{ __('page.bookings.form.type.items.' . $booking->type) }}
                    </div>
                </td>
                <!-- end::Type -->

                <!-- begin::Total -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs {{ app()->getLocale() === 'ar' ? 'text-right' : '' }} text-slate-500">
                        {{ number_format($booking->total) }}
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
                <td class="px-6 py-4 whitespace-nowrap text-right text-xs space-s-0.5 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('client.bookings.edit', $booking->id) }}"/>
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete action="{{ route('client.bookings.destroy', $booking->id) }}"/>
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
