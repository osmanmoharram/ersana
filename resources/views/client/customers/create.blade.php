<x-app-layout>
    @section('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intel-tel-input-rtl@1.0.0/build/css/intlTelInput.min.css">
    @endsection

    <x-slot name="header" class="py-6">
        {{ __('page.customers.create.header') }}
    </x-slot>

    <form action="{{ route('halls.customers.store', session('hall')->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf

        <!-- begin::Full Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.customers.form.name.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="name" value="{{ old('name') }}"
                    placeholder="{{ __('page.customers.form.name.placeholder') }}"
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Full Name -->

        <!-- begin::Email -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="email" :value="__('page.customers.form.email.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="email" value="{{ old('email') }}"
                    placeholder="{{ __('page.customers.form.email.placeholder') }}"
                />

                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Email -->

        <!-- begin::Phone -->
        <div class="grid grid-cols-2 mt-8">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="phone" :value="__('page.customers.form.phone.label')" class="mb-2"/>

                <x-input
                    type="tel" id="phone" value="{{ old('phone') }}" dir="ltr"
                    class="min-w-full {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    x-init="$el.value=''"
                />
                <input type="hidden" name="phone">

                <p id="phoneError" class="mt-1 text-xs text-red-500"></p>

                @error('phone')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Phone -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 pt-8">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('halls.bookings.create', session('hall')->id) }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/intel-tel-input-rtl@1.0.0/build/js/intlTelInput.min.js"></script>
        <script>
            const input = document.querySelector("#phone");
            const number = document.querySelector("input[name=phone]");
            const error = document.querySelector("#phoneError");

            const iti = intlTelInput(input, {
                customContainer: 'w-full',
                initialCountry: 'SD',
                utilsScript: 'https://cdn.jsdelivr.net/npm/intel-tel-input-rtl@1.0.0/build/js/utils.js',
            });

            input.onblur = () => {
                // console.log(iti.isValidNumber());
                if (iti.isValidNumber()) {
                    number.value = iti.getNumber(intlTelInputUtils.numberFormat.E164);
                    iti.setNumber(iti.getNumber(intlTelInputUtils.numberFormat.E164));
                    error.textContent = '';
                } else {
                    if (iti.getValidationError() === intlTelInputUtils.validationError.INVALID_COUNTRY_CODE) {
                        error.textContent = 'The country code is invalid';
                    }

                    if (iti.getValidationError() === intlTelInputUtils.validationError.TOO_SHORT) {
                        error.textContent = 'The phone number is too short';
                    }

                    if (iti.getValidationError() === intlTelInputUtils.validationError.TOO_LONG) {
                        error.textContent = 'The phone number is too long';
                    }

                    if (iti.getValidationError() === intlTelInputUtils.validationError.INVALID_LENGTH) {
                        error.textContent = 'The phone number length is invalid';
                    }
                }
            }
        </script>
    @endsection
</x-app-layout>


