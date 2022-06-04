<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.bookings.create.header') }}
    </x-slot>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('halls.bookings.update', ['hall' => session('hall')->id, 'booking' => $booking->id]) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Customer Name -->
        <div  class="grid grid-cols-2">
            <div class="col-span-1">
                <div class="flex items-center justify-between">
                    <x-label for="customer_id" :value="__('page.bookings.form.customer.label')" />

                    <x-actions.add href="{{ route('halls.customers.create', session('hall')->id) }}" />
                </div>

                <x-select name="customer_id" value="{{ $booking->customer_id }}" display="{{ $booking->customer->name }}" :placeholder="__('actions.select.placeholder')">
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

        <div x-data class="grid grid-cols-2 items-end">
            <div class="col-span-1">
                <div class="grid grid-cols-3 gap-x-6 items-end">
                    <!-- begin::Date -->
                    <div class="col-span-1">
                        <div class="flex items-center justify-between">
                            <x-label for="date" :value="__('page.bookings.form.date.label')" />

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <input
                            type="text" id="date" name="date" value="{{ $booking->date }}" placeholder="{{ __('page.bookings.form.date.placeholder') }}"
                            class="w-full text-sm rounded-sm placeholder-slate-300 border-none cursor-pointer shadow-sm mt-2 outline-none focus:ring-0" readonly
                            x-init="$el.value = ''"
                        />

                        @error('date')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Date -->

                    <div class="col-span-1">
                        <x-label for="period" :value="__('page.halls.form.bookingTimes.period.label')" />

                        <x-select value="{{ $booking->period }}" display="{{ __('page.halls.form.bookingTimes.period.items.' . $booking->bookingTime->period) }}" :placeholder="__('actions.select.placeholder')">
                            @foreach (['day', 'evening'] as $period)
                                <option
                                    class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                    @click="$store.selection.select($el, '{{ $period }}'); visible = false; $store.bookingTimes.setPeriod('{{ $period }}');"
                                >
                                    {{ __('page.halls.form.bookingTimes.period.items.' . $period) }}
                                </option>
                            @endforeach
                        </x-select>

                        @error('customer_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <button
                            type="button"
                            class="py-2.5 w-full text-sm text-white bg-green-400 hover:bg-green-500 shadow-sm rounded-sm mb-px transition duration-150 ease-in-out"
                            @click.prevent="$store.bookingTimes.get({{ session('hall')->id }})"
                        >
                            {{ __('page.bookings.form.bookingTimes.button') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="date" :value="__('page.bookings.form.bookingTimes.label')" />

                <div class="hidden mt-2" id="availableBookingTimes">
                    <x-table page="halls" :columns="['#', 'period', 'from', 'to', 'price']">

                        <x-slot name="pagination"></x-slot>
                    </x-table>
                </div>
            </div>
        </div>

        {{-- <div class="grid grid-cols-2 py-4">
            <div class="col-span-1"><hr></div>
        </div> --}}

        <!-- begin::Discount / Insurance / Total -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-3 gap-x-6">
                {{-- <!-- begin::Discount -->
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
                <!-- end::Insurance --> --}}

                <!-- begin::Total -->
                <div class="col-span-1">
                    <x-label for="total" :value="__('page.bookings.form.total.label')" />

                    <x-input
                        type="text" name="total" id="total" value="{{ $booking->total }}" dir="ltr" readonly
                        class="w-full mt-2 bg-slate-200/40 cursor-not-allowed text-slate-500
                        {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    />

                    @error('total')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- end::Total -->
        </div>
        <!-- end::Discount / Insurance / Total -->

        {{-- <div class="grid grid-cols-2 py-4">
            <div class="col-span-1"><hr></div>
        </div> --}}

        <!-- begin::Status -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-2 gap-x-6">
                <div class="col-span-1">
                    <x-label for="status" :value="__('page.bookings.form.status.label')" />

                    <x-select
                        name="status"
                        value="{{ $booking->status }}"
                        display="{{ __('page.bookings.form.status.items.' . $booking->status) }}"
                        placeholder="{{ __('actions.select.placeholder') }}"

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

                <x-actions.back href="{{ route('halls.bookings.index', session('hall')->id) }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>

