
<!-- begin::General -->
<a href="{{ route('halls.settings', ['hall' => session('hall')->id]) }}" class="block text-sm ps-6 hover:underline">
    {{ __('sidebar.general') }}
</a>
<!-- end::General -->

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

<!-- begin::Services -->
<a href="{{ route('halls.services.index', session('hall')->id) }}" class="block text-sm ps-6 hover:underline">
    {{ __('sidebar.services') }}
</a>
<!-- end::Services -->

<!-- begin::Roles And Permissions Fields -->
<a href="{{ route('roles.index') }}" class="block text-sm ps-6 hover:underline">
    {{ __('sidebar.roles') }}
</a>
<!-- end::Roles And Permissions Fields -->


