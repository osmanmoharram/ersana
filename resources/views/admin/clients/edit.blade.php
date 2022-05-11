<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.clients.create.header') }}
    </x-slot>

    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-4 pb-16">
        @csrf
        @method('PATCH')

        <!-- begin::Full Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.clients.form.name.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="name" value="{{ $client->name }}"
                    placeholder="{{ __('page.clients.form.name.placeholder') }}"
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Full Name -->

        <!-- begin::Email -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="email" :value="__('page.clients.form.email.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="email" value="{{ $client->email }}"
                    placeholder="{{ __('page.clients.form.email.placeholder') }}"
                />

                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Email -->

        <!-- begin::Phone -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="phone" :value="__('page.clients.form.phone.label')" />

                <x-input
                    type="text" name="phone" value="{{ $client->phone }}" dir="ltr"
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
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="address" :value="__('page.clients.form.address.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="address" value="{{ $client->address }}"
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
            <div class="col-span-1">
                <x-label for="business_field" :value="__('page.clients.form.business_field.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="business_field" value="{{ $client->business_field }}"
                    placeholder="{{ __('actions.select.placeholder') }}"
                />

                @error('business_field')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Business Field -->

        <!-- begin::Domain -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="domain" :value="__('page.clients.form.domain.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="domain" value="{{ $client->domain->domain }}"
                    placeholder="{{ __('page.clients.form.domain.placeholder') }}"
                />

                @error('domain')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Domain -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('clients.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
