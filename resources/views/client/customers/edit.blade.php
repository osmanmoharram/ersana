<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.customers.create.header') }}
    </x-slot>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4 pb-16">
        @csrf
        @method('PATCH')

        <!-- begin::Full Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.customers.form.name.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="name" value="{{ $customer->name }}"
                    placeholder="{{ __('page.customers.form.name.placeholder') }}"
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Full Name -->

        <!-- begin::Company -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="company" :value="__('page.customers.form.company.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="name" value="{{ $customer->name }}"
                    placeholder="{{ __('page.customers.form.company.placeholder') }}"
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Company -->

        <!-- begin::Email -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="email" :value="__('page.customers.form.email.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="email" value="{{ $customer->email }}"
                    placeholder="{{ __('page.customers.form.email.placeholder') }}"
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
                <x-label for="phone" :value="__('page.customers.form.phone.label')" />

                <x-input
                    type="text" name="phone" value="{{ $customer->phone }}" dir="ltr"
                    class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    placeholder="{{ __('page.customers.form.phone.placeholder') }}"
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
                <x-label for="address" :value="__('page.customers.form.address.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="address" value="{{ $customer->address }}"
                    placeholder="{{ __('page.customers.form.address.placeholder') }}"
                />

                @error('address')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Address -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('customers.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
