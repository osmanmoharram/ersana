<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.bookings.edit.header', ['booking' => $booking->id]) }}
    </x-slot>

    <form x-data action="{{ route('halls.bookings.update', ['hall' => session('hall')->id, 'booking' => $booking->id]) }}" method="POST" class="pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Customer -->
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                <x-label value="{{ __('page.bookings.create.customer_information') }}" />
            </div>

            <div class="col-span-2 space-y-4">
                <div class="flex items-center justify-between">
                    <x-label for="date" :value="__('page.customers.index.header')" />

                    <x-actions.add href="{{ route('halls.customers.create', ['hall' => session('hall')->id]) }}" size="p-1" />
                </div>

                <x-select name="customer_id" value="{{ $booking->customer->user->name }}" display="{{ $booking->customer->user->name }}" placeholder="{{ __('page.bookings.form.customer.placeholder') }}">
                    @foreach ($customers as $customer)
                        <li
                            class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                            @click="$store.selection.select($el, '{{ $customer->id }}'); visible = false"
                        >
                            {{ $customer->user->name }}
                        </li>
                    @endforeach
                </x-select>

                @error('customer_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- begin::Customer -->

        <div class="grid grid-cols-5 py-6">
            <div class="col-span-3">
                <hr>
            </div>
        </div>

        <!-- begin::Booking Times -->
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                <x-label value="{{ __('page.bookings.create.booking_times') }}" />
            </div>

            <div class="col-span-2">
                <!-- begin::Date / Period / Search Button -->
                <div class="grid grid-cols-3 gap-x-2 items-end">
                    <!-- begin::Date -->
                    <div class="col-span-1">
                        <div class="flex items-center justify-between">
                            <x-label for="date" :value="__('page.bookings.form.date.label')" />

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <input
                            type="text" id="date" name="date"
                            placeholder="{{ $errors->has('date') ? $errors->get('date')[0] : __('page.bookings.form.date.placeholder') }}"
                            class="date-picker w-full text-sm rounded-sm {{ $errors->has('date') ? 'text-xs placeholder-red-500 border border-red-500' : 'placeholder-slate-300 border-none' }} cursor-pointer shadow-sm mt-2 outline-none focus:ring-0" readonly
                            x-init="$el.value = ''"
                        />
                    </div>
                    <!-- end::Date -->

                    <!-- begin::Period -->
                    <div class="col-span-1">
                        <x-label for="period" :value="__('page.bookingTimes.form.period.label')" />

                        <x-select placeholder="{{ __('actions.select.placeholder') }}" x-init="$el.querySelector('input').value = ''">
                            @foreach (['day', 'evening'] as $period)
                                <option
                                    class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                    @click="$store.selection.select($el, '{{ $period }}'); visible = false; $store.bookingTimes.setPeriod('{{ $period }}');"
                                >
                                    {{ __('page.bookingTimes.form.period.items.' . $period) }}
                                </option>
                            @endforeach
                        </x-select>

                        @error('period')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Period -->

                    <!-- begin::Search Button -->
                    <div class="col-span-1">
                        <button
                            type="button"
                            class="py-2.5 w-full text-sm text-white bg-green-400 hover:bg-green-500 shadow-sm rounded-sm mb-px transition duration-150 ease-in-out"
                            @click.prevent="$store.bookingTimes.fetch({{ session('hall')->id }})"
                        >
                            {{ __('page.bookings.form.bookingTimes.button') }}
                        </button>
                    </div>
                    <!-- end::Search Button -->
                </div>
                <!-- end::Date / Period / Search Button -->

                <!-- begin::Available Booking Times -->
                <div class="w-full mt-4">
                    <p id="noBookingTimes" class="py-2 text-sm text-red-500"></p>

                    <label for="" class="text-sm text-slate-400">
                        {{ __('page.bookings.form.bookingTimes.label') }}
                    </label>

                    <div class="mt-2" id="availableBookingTimes">
                        <x-table page="bookingTimes" :columns="['#', 'from', 'to', 'price']" class="text-xs">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        <input
                                            name="bookingTime_id" value="{{ $booking->bookingTime->id }}" type="radio" checked
                                            class="focus:ring-slate-600 h-4 w-4 text-slate-800 border-gray-300 cursor-pointer"
                                            @click="$store.payment.setBookingTime({{ $booking->bookingTime->price }}, true)"
                                        >
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $booking->bookingTime->from }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        {{ $booking->bookingTime->to }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500">
                                        <input type="hidden" value="{{ $booking->bookingTime->price }}" id="bookingTimePrice">
                                        {{ number_format($booking->bookingTime->price, 2) }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-500"></div>
                                </td>
                            </tr>

                            <x-slot name="pagination"></x-slot>
                        </x-table>
                    </div>
                </div>
                <!-- end::Available Booking Times -->
            </div>
        </div>
        <!-- end::Booking Times -->

        <div class="grid grid-cols-5 pb-6">
            <div class="col-span-3">
                <hr>
            </div>
        </div>

        <!-- begin::Offers -->
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                <label for="" class="text-slate-400">
                    {{ __('page.bookings.create.offers') }}
                </label>
            </div>

            <!-- begin::Display Offers -->
            <div class="col-span-2">
                <div>
                    <x-label for="" value="{{ app()->getLocale() === 'ar' ? 'الباقات' : 'Offers' }}" class="text-slate-400 mb-2" />

                    <x-table page="offers" :columns="['#', 'description', 'price']" class="text-xs">
                        @foreach ($offers as $offer)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <input
                                            name="offer_id" value="{{ $offer->id }}" type="radio"
                                            class="offer focus:ring-slate-600 h-4 w-4 text-slate-800 border-gray-300 cursor-pointer"
                                            {{ $offer->id === $booking->offer_id ? 'checked' : '' }}
                                            @click="$store.payment.setOffer({{ $offer->price }}, true)"
                                        >
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-slate-500 line-clamp-2 max-w-xs">
                                        {{ $offer->description }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="offer-price text-sm text-slate-500">
                                        {{ number_format($offer->price, 2) }}
                                        <input type="hidden" class="offer-price" value="{{ $offer->price }}">
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <!-- begin::Show -->
                                    <x-modal>
                                        <x-slot name="trigger">
                                            <x-actions.show @click.prevent="isOpen = ! isOpen" class="cursor-pointer text-center"/>
                                        </x-slot>

                                        <div class="px-6 py-4 text-sm flex items-center justify-center">
                                            {{ $offer->description }}
                                        </div>
                                    </x-modal>
                                    <!-- end::Show -->
                                </td>
                            </tr>
                        @endforeach

                        <x-slot name="pagination"></x-slot>
                    </x-table>
                </div>
                <div>
                    <x-label for="" value="{{ app()->getLocale() === 'ar' ? 'الخدمات' : 'Services' }}" class="text-slate-400 mb-2" />

                        <x-table page="services" :columns="['#', 'description', 'price']" class="text-xs">
                            @foreach ($services as $service)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <input
                                                name="service_id" value="{{ $service->id }}" type="radio"
                                                class="service focus:ring-slate-600 h-4 w-4 text-slate-800 border-gray-300 cursor-pointer"
                                                {{ $service->id === $booking->service_id ? 'checked' : '' }}
                                                @click="$store.payment.setService({{ $service->price }}, true)"
                                            >
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-500 line-clamp-2 max-w-xs">
                                            {{ $service->description }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="service-price text-sm text-slate-500">
                                            {{ number_format($service->price, 2) }}
                                            <input type="hidden" class="service-price" value="{{ $service->price }}">
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <!-- begin::Show -->
                                        <x-modal>
                                            <x-slot name="trigger">
                                                <x-actions.show @click.prevent="isOpen = ! isOpen" class="cursor-pointer text-center"/>
                                            </x-slot>

                                            <div class="px-6 py-4 text-sm flex items-center justify-center">
                                                {{ $service->description }}
                                            </div>
                                        </x-modal>
                                        <!-- end::Show -->
                                    </td>
                                </tr>
                            @endforeach

                            <x-slot name="pagination"></x-slot>
                        </x-table>
                </div>
            </div>
            <!-- end::Display Offers -->
        </div>
        <!-- end::Offers -->

        <div class="grid grid-cols-5 pb-4">
            <div class="col-span-3">
                <hr>
            </div>
        </div>

        <!-- begin::Payment -->
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                <label for="" class="text-slate-400">
                    {{ __('page.bookings.create.payment') }}
                </label>
            </div>

            <div class="col-span-2 space-y-4">
                <!-- begin::Payment Method -->
                <div class="w-full">
                    <label for="" class="text-sm text-slate-400">
                        {{ __('page.bookings.form.payment_method.label') }}
                    </label>

                    <x-select
                        value="{{ $booking->payment_method }}"
                        display="{{ __('page.bookings.form.payment_method.items.' . $booking->payment_method) }}"
                        name="payment_method"
                        placeholder="{{ __('actions.select.placeholder') }}"
                    >
                        @foreach (['bank', 'cash'] as $method)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.select($el, '{{ $method }}'); visible = false"
                            >
                                {{ __('page.bookings.form.payment_method.items.' . $method) }}
                            </li>
                        @endforeach
                    </x-select>

                    @error('payment_method')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Payment Method -->

                <!-- begin::Paid Amount -->
                <div class="w-full">
                    <x-label
                        for="" value="{{ __('page.bookings.form.paid.label') }}"
                        class="text-sm text-slate-400"
                    />

                    <input
                        type="text" value="{{ number_format($booking->paid, 2) }}"
                        placeholder="{{ __('page.bookings.form.paid_amount.placeholder') }}"
                        class="bg-white w-full placeholder-slate-300 rounded-sm text-sm shadow-sm border-transparent focus:border-transparent outline-none focus:outline-none focus:ring-0 mt-2"
                        @change="$store.payment.setRemaining($el.value)"
                    >

                    @error('paid')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Paid Amount -->

                <!-- begin::Remaining Amount -->
                <div class="w-full">
                    <label for="" class="text-sm text-slate-400">
                        {{ __('page.bookings.form.remaining.label') }}
                    </label>

                    <input
                        type="text" dir="ltr" readonly
                        value="{{ number_format($booking->remaining, 2) }}"
                        class="remaining w-full bg-slate-200/40 cursor-not-allowed text-slate-500 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} bg-white placeholder-slate-300 rounded-sm text-sm shadow-sm border-transparent focus:border-transparent outline-none focus:outline-none focus:ring-0 mt-2"
                    >
                    <input type="hidden" name="remaining" class="remaining" value="{{ $booking->remaining }}">

                    @error('remaining')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Remaining Amount -->

                <!-- begin::Total -->
                <div class="w-full">
                    <x-label for="total" :value="__('page.bookings.form.total.label')" />

                    <input
                        type="text" dir="ltr" readonly
                        value="{{ number_format($booking->total, 2) }}"
                        class="total w-full bg-slate-200/40 cursor-not-allowed text-slate-500 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} bg-white placeholder-slate-300 rounded-sm text-sm shadow-sm border-transparent focus:border-transparent outline-none focus:outline-none focus:ring-0 mt-2"
                    >
                    <input type="hidden" name="total" class="total" value="{{ $booking->total }}">

                    @error('total')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Total -->
            </div>
        </div>
        <!-- end::Payment -->

        <div class="grid grid-cols-5 py-4">
            <div class="col-span-3">
                <hr>
            </div>
        </div>

        <!-- begin::Additional Information -->
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                <label for="" class="text-slate-400">
                    {{ __('page.bookings.create.additional_information') }}
                </label>
            </div>

            <div class="col-span-2 space-y-4">
                <!-- begin::Status -->
                <div class="w-full">
                    <x-label for="status" :value="__('page.bookings.form.status.label')" />

                    <x-select
                        name="status"
                        value="{{ $booking->status }}"
                        display="{{ __('page.bookings.form.status.items.' . $booking->status) }}"
                        placeholder="{{ __('actions.select.placeholder') }}"
                    >
                        @foreach (['confirmed', 'temporary', 'paid', 'canceled'] as $status)
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
                <!-- end::Status -->

                <!-- begin::Notes -->
                <div class="w-full">
                    <x-label for="status" :value="__('page.bookings.form.notes.label')" />

                    <x-textarea
                        class="resize-none"
                        name="notes" value="{{ old('notes') }}"
                        placeholder="{{ __('page.bookings.form.notes.placeholder') }}"
                        value="{{ $booking->notes }}"
                    />

                    @error('notes')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Notes -->
            </div>
        </div>
        <!-- end::Additional Information -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-5 py-8">
            <div class="col-span-1"></div>

            <div class="col-span-2 flex items-center justify-between">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('halls.bookings.index', session('hall')->id) }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
