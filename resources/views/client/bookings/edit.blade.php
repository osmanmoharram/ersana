<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.bookings.edit.header', ['booking' => $booking->slug]) }}
    </x-slot>

    <form action="{{ route('client.bookings.update', $booking->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Customer Name -->
        <div  class="grid grid-cols-2">
            <div class="col-span-1">
                <div class="flex items-center space-s-8">
                    <x-label for="customer_id" :value="__('page.bookings.form.customer.label')" />

                    <x-actions.add href="{{ route('client.customers.create') }}" />
                </div>

                <x-select
                    name="customer_id"
                    value="{{ $booking->customer_id }}"
                    display="{{ $booking->customer->name }}"
                >
                    @foreach ($customers as $customer)
                        <li
                            class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                            @click="$store.selection.select($el, '{{ $customer->id }}'); visible = false"
                        >
                            {{ $customer->name }}
                        </li>
                    @endforeach
                </x-select>

                @error('customer_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Customer Name -->

        <!-- begin::Start / End Dates -->
        <div x-data class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-2 gap-x-6">
                <!-- begin::Start Date -->
                <div class="col-span-1">
                    <x-label for="start_date" :value="__('page.bookings.form.start_date.label')" />

                    <div class="relative">
                        <x-datetime
                            name="start_date" value="{{ $booking->start_date }}"
                            x-init="flatpickr($el, {
                                altInput: true,
                                altFormat: 'M j, Y h:i K',
                                enableTime: true,
                                disable: {{ json_encode($booked) }},
                            })"
                        />

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 absolute left-3 top-5 cursor-pointer text-slate-400" @click="$refs.start_date.click()" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>

                    @error('start_date')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Start Date -->

                <!-- begin::End Date -->
                <div class="col-span-1">
                    <x-label for="end_date" :value="__('page.bookings.form.end_date.label')" />

                    <div class="relative">
                        <x-datetime
                            name="end_date" value="{{ $booking->end_date }}"
                            x-init="flatpickr($el, {
                                enableTime: true,
                                altInput: true,
                                altFormat: 'M j, Y h:i K',
                                disable: {{ json_encode($booked) }}
                            })"
                        />

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 absolute left-3 top-5 cursor-pointer text-slate-400" @click="$refs.start_date.click()" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>

                    @error('end_date')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::End Date -->
            </div>
        </div>
        <!-- end::Start / End Dates -->

        <!-- begin::Type / Guest Type / Food Menu -->
        <div class="grid grid-cols-2">
            <div  class="col-span-1 grid grid-cols-3 gap-x-6">
                <!-- begin::Type -->
                <div class="col-span-1">
                    <x-label for="type" :value="__('page.bookings.form.type.label')" />

                    <x-select
                        name="type"
                        value="{{ $booking->type }}"
                        display="{{ __('page.bookings.form.type.items.' . $booking->type) }}"
                    >
                        @foreach (['weddings', 'events', 'occassions'] as $type)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.select($el, '{{ $type }}'); visible = false"
                            >
                                {{ __('page.bookings.form.type.items.' . $type) }}
                            </li>
                        @endforeach
                    </x-select>

                    @error('type')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Type -->

                <!-- begin::Guest Type -->
                <div class="col-span-1">
                    <x-label for="guest_type" :value="__('page.bookings.form.guest_type.label')" />

                    <x-select
                        name="guest_type"
                        value="{{ $booking->guest_type }}"
                        display="{{ __('page.bookings.form.guest_type.items.' . $booking->guest_type) }}"
                    >
                        @foreach (['men', 'women', 'men_women'] as $type)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.select($el, '{{ $type }}'); visible = false"
                            >
                                {{ __('page.bookings.form.guest_type.items.' . $type) }}
                            </li>
                        @endforeach
                    </x-select>

                    @error('guest_type')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Guest Type -->

                <!-- begin::Food Menu -->
                <div class="col-span-1">
                    <x-label for="food_menu" :value="__('page.bookings.form.food_menu.label')" />

                    <x-select
                        name="food_menu"
                        value="{{ $booking->food_menu }}"
                        display="{{ __('page.bookings.form.guest_type.items.' . $booking->food_menu) }}"
                    >
                        @foreach (['men', 'women', 'men_women'] as $type)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.select($el, '{{ $type }}'); visible = false"
                            >
                                {{ __('page.bookings.form.guest_type.items.' . $type) }}
                            </li>
                        @endforeach
                    </x-select>

                    @error('food_menu')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Food Menu -->
            </div>
        </div>
        <!-- end::Booking Type/Guest Type/Food Menu -->

        <div class="grid grid-cols-2 py-4">
            <div class="col-span-1"><hr></div>
        </div>

        <div x-data class="space-y-4">
            <!-- begin::Price Type -->
            <div class="grid grid-cols-2">
                <div class="col-span-1 grid grid-cols-2 gap-x-6">
                    <div class="col-span-1">
                        <x-label for="price_type" :value="__('page.bookings.form.price_type.label')" />

                        <x-select
                            name="price_type"
                            value="{{ $booking->price_type }}"
                            display="{{ __('page.bookings.form.price_type.items.' . $booking->price_type) }}"
                        >
                            @foreach (['fixed', 'individual'] as $type)
                                <li
                                    class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                    @click="$store.selection.select($el, '{{ $type }}'); $store.selection.priceType('{{ $type }}'); visible = false"
                                >
                                    {{ __('page.bookings.form.price_type.items.' . $type) }}
                                </li>
                            @endforeach
                        </x-select>

                        @error('price_type')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- end::Price Type -->

            <!-- begin::Fixed Price / Individual Price / Number Of Guests -->
            <div class="grid grid-cols-2">
                <div class="col-span-1 grid grid-cols-3 gap-x-6">
                    <!-- begin::Fixed Price -->
                    <div class="col-span-1">
                        <x-label for="fixed_price" :value="__('page.bookings.form.fixed_price.label')" />

                        <x-input
                            type="text" id="fixedPrice" name="fixed_price" value="{{ $booking->fixed_price ?? 0 }}" dir="ltr"
                            class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} {{ $booking->price_type === 'fixed' ? 'bg-white text-slate-800' : 'bg-slate-200/40 text-slate-500 cursor-not-allowed' }}"
                            x-init="$el.disabled='{{ $booking->price_type !== 'fixed' }}'"
                            @change="$store.computeTotal.compute('fixed')"
                        />

                        @error('fixed_price')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Fixed Price -->

                    <!-- begin::Individual Price -->
                    <div class="col-span-1">
                        <x-label for="individual_price" :value="__('page.bookings.form.individual_price.label')" />

                        <x-input
                            type="text" id="individualPrice" name="individual_price" value="{{ $booking->individual_price ?? 0 }}" dir="ltr"
                            class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}
                            {{ $booking->price_type === 'individual' ? 'bg-white text-slate-800' : 'bg-slate-200/40 text-slate-500 cursor-not-allowed' }}"
                            x-init="$el.disabled={{ $booking->price_type !== 'individual' }}"
                            @blur="$store.computeTotal.compute('individual')"
                        />

                        @error('individual_price')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Individual Price -->

                    <!-- begin::Number Of Guests -->
                    <div class="col-span-1">
                        <x-label for="guests_number" :value="__('page.bookings.form.number_of_guests.label')" />

                        <x-input
                            type="text" id="numberOfGuests" name="number_of_guests" value="{{ $booking->number_of_guests ?? 0 }}" dir="ltr" disabled
                            class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}
                            {{ $booking->price_type === 'individual' ? 'bg-white text-slate-800' : 'bg-slate-200/40 text-slate-500 cursor-not-allowed' }}"
                            x-init="$el.disabled={{ $booking->price_type !== 'individual' }}"
                            @blur="$store.computeTotal.compute('individual')"
                        />

                        @error('number_of_guests')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Number Of Guests -->
                </div>
            </div>
            <!-- end::Fixed Price / Individual Price / Number Of Guests -->

            <!-- begin::Vat / Discount / Insurance -->
            <div class="grid grid-cols-2">
                <div class="col-span-1 grid grid-cols-3 gap-x-6">
                    <!-- begin::Discount -->
                    <div class="col-span-1">
                        <x-label for="discount" :value="__('page.bookings.form.discount.label')" />

                        <x-input
                            type="text" id="discount" name="discount" value="{{ $booking->discount }}" dir="ltr"
                            class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
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
                            type="text" name="insurance" value="{{ $booking->insurance }}" dir="ltr"
                            class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                        />

                        @error('insurance')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Insurance -->

                    <!-- begin::Vat -->
                    <div class="col-span-1">
                        <x-label for="type" :value="__('page.bookings.form.vat.label')" />

                        <x-select
                            name="vat"
                            value="{{ $booking->vat }}"
                            display="{{ $booking->vat }}"
                            placeholder="{{ __('actions.select.placeholder') }}"
                        >
                            @foreach ([0, 0.05, 0.15, 0.20] as $value)
                                <li
                                    class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                    @click="$store.selection.select($el, '{{ $value }}'); $store.computeTotal.applyVat({{ $value }}); $store.computeTotal.compute(); visible = false"
                                >
                                    {{ $value }}
                                </li>
                            @endforeach
                        </x-select>

                        @error('vat')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Vat -->
                </div>
            </div>
            <!-- end::Vat / Discount / Insurance -->

            <!-- begin::Total -->
            <div class="grid grid-cols-2">
                <div class="col-span-1 grid grid-cols-2 gap-x-6">
                    <div class="col-span-1">
                        <x-label for="total" :value="__('page.bookings.form.total.label')" />

                        <input type="hidden" name="total" id="total" value="{{ $booking->total }}">

                        <x-input
                            type="text" value="{{ $booking->total }}" dir="ltr" readonly
                            class="w-full mt-1 bg-slate-200/40 cursor-not-allowed text-slate-500
                            {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                        />

                        @error('total')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- end::Total -->
        </div>

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
                        value="{{ $booking->status }}"
                        display="{{ __('page.bookings.form.status.items.' . $booking->status) }}"
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

                <x-textarea class="resize-none" name="notes" value="{{ $booking->notes }}"/>

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
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('client.bookings.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
