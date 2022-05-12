<x-app-layout>
    <x-slot name="header" class="py-6 px-4">
        {{ __('page.clients.create.header') }}
    </x-slot>

    <form action="{{ route('clients.store') }}" method="POST" class="space-y-4 pb-8 px-4">
        @csrf

        <!-- begin::Full Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="name" :value="__('page.clients.form.name.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="name" value="{{ old('name') }}"
                    placeholder="{{ __('page.clients.form.name.placeholder') }}"
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Full Name -->

        <!-- begin::Email -->
        <div class="grid grid-cols-2 mt-8">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="email" :value="__('page.clients.form.email.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="email" value="{{ old('email') }}"
                    placeholder="{{ __('page.clients.form.email.placeholder') }}"
                />

                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Email -->

        <!-- begin::Phone -->
        <div class="grid grid-cols-2 mt-8">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="phone" :value="__('page.clients.form.phone.label')" />

                <x-input
                    type="text" name="phone" value="{{ old('phone') }}" dir="ltr"
                    class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    placeholder="{{ __('page.clients.form.phone.placeholder') }}"
                />

                @error('phone')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Phone -->

        <!-- begin::Address -->
        <div class="grid grid-cols-2 mt-8">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="address" :value="__('page.clients.form.address.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="address" value="{{ old('address') }}"
                    placeholder="{{ __('page.clients.form.address.placeholder') }}"
                />

                @error('address')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Address -->

        <!-- begin::Business Field -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <div class="flex items-center justify-between">
                    <x-label for="business_field" class="" :value="__('page.clients.form.business_field.label')" />

                    <!-- begin::Add -->
                    <x-actions.add href="{{ route('business-fields.create') }}" />
                    <!-- end::Add -->
                </div>

                <x-select name="business_field_id" placeholder="{{ __('actions.select.placeholder') }}">
                    @foreach ($business_fields as $business_field)
                        <li
                            class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" business_field="option"
                            @click="$store.selection.select($el, '{{ $business_field->id }}'); visible = false"
                        >
                            {{ $business_field->name }}
                        </li>
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- end::Business Field -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 pt-8">
            <div class="col-span-2 max-w-[560px] flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('clients.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
