<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.users.edit.header', ['user' => $user->name]) }}
    </x-slot>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.users.form.name.label')" />

                <div>
                    <x-input
                        type="text" class="w-full mt-1" name="name" value="{{ $user->name }}"
                        placeholder="{{ __('page.users.form.name.placeholder') }}"
                    />

                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
             </div>
        </div>
        <!-- end::Name -->

        <!-- begin::Email -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="email" :value="__('page.users.form.email.label')" />

                <div>
                    <x-input
                        type="text" class="w-full mt-1" name="email" value="{{ $user->email }}"
                        placeholder="{{ __('page.users.form.email.placeholder') }}"
                    />

                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <!-- end::Email -->

        <!-- begin::Phone -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="phone" :value="__('page.users.form.phone.label')" />

                <div class="flex items-center">
                    {{-- <span class="block border border-slate-400 bg-slate-200 text-slate-500 text-xs p-3 shadow-lg">+966</span> --}}

                    <div class="flex-1">
                        <x-input
                            type="text" class="w-full" name="phone" value="{{ $user->phone }}"
                            placeholder="{{ __('page.users.form.phone.placeholder') }}"
                        />

                        @error('phone')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- end::Phone -->

        <!-- begin::Role -->
        <div class="grid grid-cols-2 pb-28">
            <div x-data="{ visible: false }" class="col-span-1 flex flex-col">
                <x-label for="role" class="" :value="__('page.users.form.role.label')" />

                <div class="mt-1 relative w-full">
                    <button
                        type="button" @click="visible = ! visible"
                        class="relative cursor-pointer w-full flex items-center justify-between bg-white border
                        rounded-sm shadow-sm ps-4 pe-3 py-3 text-left focus:outline-none border-slate-300 sm:text-sm"
                        aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                    >
                        <span id="selectedRole" class="text-slate-800 text-sm">
                            {{ __('page.users.roles.' . $user->role) }}
                        </span>

                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    @error('role')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror

                    <ul
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-sm py-1 text-base ring-1
                        ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                        tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3"
                        x-show="visible"
                        @click.away="visible = false"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <input type="hidden" name="role" id="role" value="{{ $user->role }}">

                        @foreach ($roles as $role)
                            <li
                                class="hover:bg-gray-100 text-gray-900 cursor-pointer select-none relative py-2 ps-4"
                                @click.prevent="visible = false; $store.roleSelection.select('{{ ucwords($role->title) }}', '{{ app()->getLocale() }}')"
                                id="listbox-option-1" role="option"
                            >
                                <label class="font-normal block cursor-pointer truncate">
                                    {{ ucwords(__('page.users.roles.' . $role->title )) }}
                                </label>

                                <span class="checkmark hidden text-coolgray-400 absolute inset-y-0 right-0 items-center pr-4">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- end::Role -->

        <!-- begin::Form Buttons -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button class="px-8 py-3">
                    {{ __('actions.edit.page')}}
                </x-button>

                <a
                    href="{{ route('users.index') }}"
                    class="px-8 py-3 bg-gray-800 border border-transparent rounded-sm font-semibold
                    text-xs text-slate-300 uppercase hover:bg-gray-700 cursor-pointer active:bg-gray-900 focus:outline-none
                    disabled:opacity-25 transition ease-in-out duration-150"
                >
                    {{ __('actions.back')}}
                </a>
            </div>
        </div>
        <!-- end::Form Buttons -->
    </form>
</x-app-layout>
