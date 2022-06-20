<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-s-8">
            <span class="block">
                {{ __('page.halls.create.header') }}
            </span>
        </div>
    </x-slot>

    <form x-data action="{{ route('halls.update', $hall->id) }}" method="POST" class="mt-2 pb-8">
        @csrf
        @method('PATCH')

        <div class="space-y-4">
            <!-- begin::Name -->
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <x-label for="hall_name" :value="__('page.halls.form.name.label')" />

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

            <!-- begin::City -->
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <x-label for="city" :value="__('page.halls.form.city.label')" />

                    <x-select name="city" value="{{ $hall->city }}" display="{{ __('cities.' . $hall->city) }}" placeholder="{{ __('page.halls.form.city.placeholder') }}">
                        @foreach (['bahri', 'khartoum', 'madani', 'omdurman','port Sudan'] as $city)
                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.select($el, '{{ $city }}'); visible = false"
                            >
                                {{ __('cities.' . $city) }}
                            </li>
                        @endforeach
                    </x-select>

                    @error('city')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- end::City -->

            <!-- begin::Address -->
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <x-label for="hall_address" :value="__('page.halls.form.address.label')" />

                    <x-input
                        type="text" class="w-full" name="address" value="{{ $hall->address }}"
                        placeholder="{{ __('page.halls.form.address.placeholder') }}"
                    />

                    @error('address')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- end::Address -->

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
        </div>

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 mt-8">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('halls.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>

</x-app-layout>
