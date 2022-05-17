<x-hall-layout>
    <x-slot name="header">
        <div class="flex items-center space-s-8">
            <span class="block">
                {{ __('page.halls.create.header') }}
            </span>
        </div>
    </x-slot>

    <form x-data action="{{ route('halls.update', $hall->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.halls.form.name.label')" />

                <x-input
                    type="text" class="w-full" name="name" value="{{ $hall->name }}"
                    placeholder="{{ __('page.halls.form.name.placeholder') }}"
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Name -->

        <!-- begin::Location -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="location" :value="__('page.halls.form.location.label')" />

                <x-input
                    type="text" class="w-full" name="location" value="{{ $hall->location }}"
                    placeholder="{{ __('page.halls.form.location.placeholder') }}"
                />

                @error('location')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Location -->

        <!-- begin::Capacity -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="capacity" :value="__('page.halls.form.capacity.label')" />

                <x-input
                    type="text" class="w-full" name="capacity" value="{{ $hall->capacity }}"
                    placeholder="{{ __('page.halls.form.capacity.placeholder') }}"
                />

                @error('capacity')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Capacity -->

        <!-- begin::Enter Booking Times -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="enter" :value="__('page.halls.form.bookingTimes.enter.label')" />

                <div class="grid grid-cols-5 items-end gap-x-2 mt-2">
                    <!-- begin::Period -->
                    <div class="col-span-1">
                        <x-label for="period" :value="__('page.halls.form.bookingTimes.period.label')" class="text-xs" />

                        <x-select id="period" placeholder="{{ __('actions.select.placeholder') }}">
                            @foreach (['day', 'evening'] as $period)
                                <li
                                    class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" business_field="option"
                                    @click="$store.selection.select($el, '{{ $period }}'); visible = false"
                                >
                                    {{ __('page.halls.form.bookingTimes.period.items.' . $period) }}
                                </li>
                            @endforeach
                        </x-select>
                    </div>
                    <!-- end::Period -->

                    <!-- begin::From -->
                    <div class="col-span-1">
                        <x-label for="from" :value="__('page.halls.form.bookingTimes.from.label')" class="text-xs" />

                        <input
                            type="text" id="from" placeholder="{{ __('page.halls.form.bookingTimes.from.placeholder') }}"  readonly="readonly"
                            class="flatpickr flatpickr-input w-full bg-white placeholder-slate-300 rounded-sm text-sm shadow-sm border-none outline-none focus:outline-none focus:ring-0 mt-2"
                            data-id="multipleCustomConjunction"
                        >

                        @error('from')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::From -->

                    <!-- begin::To -->
                    <div class="col-span-1">
                        <x-label for="to" :value="__('page.halls.form.bookingTimes.to.label')" class="text-xs" />

                        <input
                            type="text" id="to" placeholder="{{ __('page.halls.form.bookingTimes.to.placeholder') }}" readonly="readonly"
                            class="flatpickr flatpickr-input w-full bg-white placeholder-slate-300 rounded-sm text-sm shadow-sm border-none outline-none focus:outline-none focus:ring-0 mt-2"
                            data-id="multipleCustomConjunction"
                        >

                        @error('to')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::To -->

                    <!-- begin::Price -->
                    <div class="col-span-1">
                        <x-label for="price" :value="__('page.halls.form.bookingTimes.price.label')" class="text-xs" />

                        <x-input
                            type="text" id="price" class="w-full"
                            placeholder="{{ __('page.halls.form.bookingTimes.price.placeholder') }}"
                        />

                        @error('price')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Price -->

                    <!-- begin::Button -->
                    <div class="col-span-1">
                        <span class="sr-only">Add Button</span>

                        <div class="flex items-center justify-center">
                            <button @click.prevent="$store.selection.period()" class="text-green-400 hover:text-green-500 py-2 px-4 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- end::Button -->
                </div>

                @error('bookingTimes')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                @error('bookingTimes.*.from')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                @error('bookingTimes.*.to')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Enter Booking Times -->

        <!-- begin::Display Booking Times -->
        <div class="grid grid-cols-2 mt-2">
            <div class="col-span-1">
                <x-label for="display" :value="__('page.halls.form.bookingTimes.display.label')" class="mb-2"/>

                <x-table page="halls" :columns="['period', 'from', 'to', 'price']" id="bookingTimes">
                    @foreach ($hall->bookingTimes as $key => $time)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-500">
                                    <input type="hidden" name="bookingTimes[{{ $key }}][period]" value="{{ $time['period'] }}">
                                    {{ __('page.halls.form.bookingTimes.period.items.' . $time->period) }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-500">
                                    <input type="hidden" name="bookingTimes[{{ $key }}][from]" value="{{ substr($time['from'],0,5) }}">
                                    {{ substr($time['from'],0,5) }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-500">
                                    <input type="hidden" name="bookingTimes[{{ $key }}][to]" value="{{ substr($time['to'],0,5) }}">
                                    {{ substr($time['to'],0,5) }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-500">
                                    <input type="hidden" name="bookingTimes[{{ $key }}][price]" value="{{ $time['price'] }}">
                                    {{ $time['price'] }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <button @click.prevent="$el.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-500 py-2 px-4 transition duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            <td>
                        </tr>
                    @endforeach

                    <x-slot name="pagination"></x-slot>
                </x-table>
            </div>
        </div>
        <!-- end::Display Booking Times -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('halls.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>

</x-hall-layout>
