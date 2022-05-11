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

                <div class="flex items-start mt-1">
                    <x-input
                        type="text" class="w-full" name="capacity" value="{{ old('capacity') }}"
                        placeholder="{{ __('page.halls.form.capacity.placeholder') }}"
                        class="mt-0 flex-1"
                    />

                    <span class="block h-[42px] bg-slate-200/40 text-slate-400 shadow-sm rounded-sm text-sm py-3 px-6">
                        {{ __('page.halls.form.capacity.person') }}
                    </span>
                </div>

                @error('capacity')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Location -->

        <div class="grid grid-cols-2 py-4">
            <div class="col-span-1"><hr></div>
        </div>

        <!-- begin::Start / End / Average -->
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
        <!-- end::Start / End / Average -->

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
