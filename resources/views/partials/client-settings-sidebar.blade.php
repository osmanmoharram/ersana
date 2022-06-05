<!-- begin::Booking Times -->
<a href="{{ route('halls.booking-times.index', session('hall')->id) }}" class="block text-sm ps-6 hover:underline">
    {{ __('sidebar.booking_times') }}
</a>
<!-- end::Booking Times -->

<!-- begin::Offers -->
<a href="{{ route('halls.offers.index', session('hall')->id) }}" class="block text-sm ps-6 hover:underline">
    {{ __('sidebar.offers') }}
</a>
<!-- end::Offers -->
