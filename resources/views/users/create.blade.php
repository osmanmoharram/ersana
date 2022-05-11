<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.users.create.header') }}
    </x-slot>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4 pb-8">
        @csrf

        <!-- begin::Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.users.form.name.label')" />

                <div>
                    <x-input
                        type="text" class="w-full" name="name" value="{{ old('name') }}"
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
                        type="text" class="w-full" name="email" value="{{ old('email') }}"
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
                    <div class="flex-1">
                        <x-input
                            type="text" class="w-full" name="phone" value="{{ old('phone') }}"
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
            <x-label for="role" class="" :value="__('page.users.form.role.label')" />

            <x-select name="role_id" >
                @foreach ($roles as $role)
                    <li
                        class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                        @click="$store.selection.resource($el, {{ $role->toJson() }}); visible = false"
                    >
                        {{ $role->name }}
                    </li>
                @endforeach
            </x-select>
        </div>
        <!-- end::Role -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('users.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
