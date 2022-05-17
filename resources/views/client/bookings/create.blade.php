<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.bookings.create.header') }}
    </x-slot>

    <form action="{{ route('halls.bookings.store', session('hall')->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf

        <!-- begin::Customer Name -->
        <div  class="grid grid-cols-4">
            <div class="col-span-1">
                <div class="flex items-center justify-between">
                    <x-label for="customer_id" :value="__('page.bookings.form.customer.label')" />

                    <x-actions.add href="{{ route('halls.customers.create', session('hall')->id) }}" />
                </div>

                <x-select name="customer_id" :placeholder="__('actions.select.placeholder')">
                    @foreach ($customers as $customer)
                        <option
                            value=""
                            class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                            @click="$store.selection.select($el, '{{ $customer->id }}'); visible = false"
                        >
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </x-select>

                @error('customer_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Customer Name -->

        <!-- begin::Date -->
        <div  class="grid grid-cols-4">
            <div class="col-span-1">
                <x-label for="date" :value="__('page.bookings.form.date.label')" />

                <div class="relative">
                    <x-datetime
                        name="date" value="{{ old('date') }}" placeholder="{{ __('page.bookings.form.date.placeholder') }}"
                        x-init="flatpickr($el, {
                            altInput: true,
                            altFormat: 'M j, Y h:i K',
                            enableTime: true,
                            disable: {{ json_encode($booked) }},
                        })"
                    />

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute {{ app()->getLocale() === 'ar' ? 'left-3' : 'right-3' }} top-5 cursor-pointer text-slate-400" @click="$refs.start_date.click()" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>

                @error('date')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Date -->

        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="date" :value="__('page.bookings.form.bookingTimes.label')" />


            </div>
        </div>

        <div class="grid grid-cols-2 py-4">
            <div class="col-span-1"><hr></div>
        </div>

        <!-- begin::Discount / Insurance / Total -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-3 gap-x-6">
                <!-- begin::Discount -->
                <div class="col-span-1">
                    <x-label for="discount" :value="__('page.bookings.form.discount.label')" />

                    <x-input
                        type="text" id="discount" name="discount" value="0" dir="ltr"
                        class="w-full mt-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                        @change="$store.computeTotal.compute()"
                    />

                    @error('discount')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Discount -->

                <!-- begin::Insurance -->
                <div class="col-span-1">
                    <x-label for="insurance" :value="__('page.bookings.form.insurance.label')" />

                    <x-input
                        type="text" name="insurance" value="0" dir="ltr"
                        class="w-full mt-2 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    />

                    @error('insurance')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Insurance -->

                <!-- begin::Total -->
                <div class="col-span-1">
                    <x-label for="total" :value="__('page.bookings.form.total.label')" />

                    <x-input
                        type="text" value="{{ old('total') }}" dir="ltr" readonly
                        class="w-full mt-2 bg-slate-200/40 cursor-not-allowed text-slate-500
                        {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    />

                    <input type="hidden" name="total" id="total" value="{{ old('total') }}">

                    @error('total')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- end::Total -->
        </div>
        <!-- end::Discount / Insurance / Total -->

        <div class="grid grid-cols-2 py-4">
            <div class="col-span-1"><hr></div>
        </div>

        <!-- begin::Status -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-2 gap-x-6">
                <div class="col-span-1">
                    <x-label for="status" :value="__('page.bookings.form.status.label')" />

                    <x-select
                        name="status"
                        :value="old('status')"
                        :display="old('status') ? __('page.bookings.form.status.items.' . old('status')) : null"
                        :placeholder="__('actions.select.placeholder')"

                    >
                        @foreach (['confirmed', 'temporary'] as $status)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.select($el, '{{ $status }}'); visible = false"
                            >
                                {{ __('page.bookings.form.status.items.' . $status) }}
                            </li>
                        @endforeach
                    </x-select>

                    @error('status')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <!-- end::Status -->

        <!-- begin::Notes -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="status" :value="__('page.bookings.form.notes.label')" />

                <x-textarea class="resize-none" name="notes" value="{{ old('notes') }}"/>

                @error('notes')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Notes -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 py-8">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('halls.bookings.index', session('hall')->id) }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
