<x-hall-layout>
    <x-slot name="header">
        <div class="flex items-center space-s-8">
            <span class="block">
                {{ __('page.halls.create.header') }}
            </span>
        </div>
    </x-slot>

    <form action="{{ route('client.halls.update', $hall->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="space-y-8">
            <!-- begin::Name -->
            <div class="max-w-lg w-full">
                <x-label for="name" :value="__('page.halls.form.name.label')" />

                <div>
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
            <div  class="max-w-lg w-full">
                <x-label for="location" :value="__('page.halls.form.location.label')" />

                <div>
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
            <div  class="max-w-lg w-full">
                <x-label for="capacity" :value="__('page.halls.form.capacity.label')" />

                <div class="flex items-start mt-1">
                    <x-input
                        type="text" class="w-full" name="capacity" value="{{ $hall->capacity }}"
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
            <!-- end::Capacity -->

            <!-- begin::Type -->
            <div  class="max-w-lg w-full">
                <x-label for="type" :value="__('page.halls.form.type.label')" />

                <div x-data="{ visible: false }" class="w-full">
                    <div class="relative">
                        <button
                            type="button"
                            @click="visible = ! visible"
                            class="w-full flex items-center justify-between cursor-pointer rounded-sm shadow-sm bg-white mt-1
                            {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-sm p-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                        >
                            <input id="selectedOption" type="hidden" name="type" value="{{ $hall->type }}">

                            <span  class="block text-slate-800">
                                {{ __('page.halls.types.' . $hall->type) }}
                            </span>

                            <span class="block">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                        </button>

                        <ul x-show="visible"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            @click.away="visible = false"
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-sm py-1 ring-1
                            ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">

                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.type('wedding', '{{ app()->getLocale() }}'); visible = false"
                            >
                                {{ __('page.halls.types.wedding') }}
                            </li>

                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.type('events', '{{ app()->getLocale() }}'); visible = false"
                            >
                                {{ __('page.halls.types.events') }}
                            </li>

                            <li
                                class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                @click="$store.selection.type('theatre', '{{ app()->getLocale() }}'); visible = false"
                            >
                                {{ __('page.halls.types.theatre') }}
                            </li>
                        </ul>
                    </div>
                </div>

                @error('type')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <!-- end::Type -->
        </div>

        <!-- begin::Form Button -->
        <div class="max-w-lg w-full flex items-center justify-between mt-8">
            <x-button>
                {{ __('actions.edit.form')}}
            </x-button>

            <x-actions.back href="{{ route('client.halls.index') }}"/>
        </div>
        <!-- end::Form Button -->
    </form>

</x-hall-layout>
