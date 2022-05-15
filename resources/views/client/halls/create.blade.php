<x-hall-layout>
    <x-slot name="header">
        <div class="flex items-center space-s-8">
            <span class="block">
                {{ __('page.halls.create.header') }}
            </span>
        </div>
    </x-slot>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('client.halls.store') }}" method="POST" class="space-y-4 pb-8">
        @csrf

        <!-- begin::Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.halls.form.name.label')" />

                <x-input
                    type="text" class="w-full" name="name" value="{{ old('name') }}"
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
                    type="text" class="w-full" name="location" value="{{ old('location') }}"
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
                    type="text" class="w-full" name="capacity" value="{{ old('capacity') }}"
                    placeholder="{{ __('page.halls.form.capacity.placeholder') }}"
                />

                @error('capacity')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Capacity -->

        <!-- begin::Booking Times -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-4">
                <x-label for="period" :value="__('page.halls.form.bookingTimes.label')" />

                <div class="col-span-1">
                    <x-label for="period" :value="__('page.halls.form.bookingTimes.period.label')" />

                    <x-select id="period" placeholder="{{ __('actions.select.placeholder') }}">
                        @foreach (['day', 'evening'] as $period)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" business_field="option"
                                @click="$store.selection.select($el, '{{ $period }}'); visible = false"
                            >
                                {{ __('page.halls.form.bookingTimes.period.items' . $period) }}
                            </li>
                        @endforeach
                    </x-select>
                </div>
                <div class="cols-span-1">
                    <x-label for="from" :value="__('page.halls.form.bookingTimes.from.label')" />

                    <input
                        type="text" id="from" placeholder="{{ __('page.halls.form.bookingTimes.from.placeholder') }}"  readonly="readonly"
                        class="flatpickr flatpickr-input"
                        data-id="multipleCustomConjunction"
                    >
                </div>
                <div class="cols-span-1">
                    <x-label for="to" :value="__('page.halls.form.bookingTimes.to.label')" />

                    <input
                        type="text" id="to" placeholder="{{ __('page.halls.form.bookingTimes.to.placeholder') }}" readonly="readonly"
                        class="flatpickr flatpickr-input"
                        data-id="multipleCustomConjunction"
                    >
                </div>
                <div class="cols-span-1">
                    <x-label for="to" :value="__('Add')" class="sr-only"/>

                    <x-button @click="$store.selection.period()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                    </x-button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-table name="halls" id="bookingTimes" :columns=['period', 'from', 'to']>

                </x-table>
            </div>
        </div>
        <!-- end::Booking Times -->

        {{-- <!-- begin::Start / End / Average -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 grid grid-cols-3 gap-x-6">
                <!-- begin::Start time -->
                <div class="col-span-1">
                    <x-label for="start_time" :value="__('page.halls.form.start_time.label')" />

                    <div x-data class="relative">
                        <x-time-input
                            name="start_time" value="{{ old('start_time') }}" placeholder="{{ __('page.halls.form.start_time.placeholder') }}"
                            x-init="flatpickr($el, {
                                enableTime: true,
                                noCalendar: true,
                                dateFormat: 'H:i',
                                minTime: '08:00',
                                maxTime: '00:00',
                            })"
                        />

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute {{ app()->getLocale() === 'ar' ? 'left-3' : 'right-3' }} top-5 cursor-pointer text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>

                    @error('start_time')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Start time -->

                <!-- begin::End time -->
                <div class="col-span-1">
                    <x-label for="end_time" :value="__('page.halls.form.end_time.label')" />

                    <div x-data class="relative">
                        <x-time-input
                            name="end_time" value="{{ old('end_time') }}" placeholder="{{ __('page.halls.form.end_time.placeholder') }}"
                            x-init="flatpickr($el, {
                                enableTime: true,
                                noCalendar: true,
                                dateFormat: 'H:i',
                                minTime: '08:00',
                                maxTime: '00:00',
                            })"
                        />

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute {{ app()->getLocale() === 'ar' ? 'left-3' : 'right-3' }} top-5 cursor-pointer text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>

                    @error('end_time')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::End time -->

                <!-- begin::Average time -->
                <div class="col-span-1">
                    <x-label for="average_time" :value="__('page.halls.form.average_time.label')" />

                    <x-input
                        name="average_time" value="{{ old('average_time') }}" placeholder="{{ __('page.halls.form.average_time.placeholder') }}"
                        class="w-full py-2 ps-3"
                    />

                    @error('average_time')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end::Average time -->
            </div>
        </div>
        <!-- end::Start / End / Average --> --}}

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between mt-8">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('client.halls.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>

</x-hall-layout>
