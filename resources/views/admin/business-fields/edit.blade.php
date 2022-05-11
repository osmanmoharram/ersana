<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.business-fields.create.header') }}
    </x-slot>

    <form action="{{ route('business-fields.update', $business_field->id) }}" method="POST" class="space-y-4 pb-16">
        @csrf
        @method('PATCH')

        <!-- begin::Title -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.business-fields.form.title.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="title" value="{{ $business_field->title }}"
                    placeholder="{{ __('page.business-fields.form.title.placeholder') }}"
                />

                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Title -->

        <!-- begin::Type -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="email" :value="__('page.business-fields.form.email.label')" />

                <x-select name="type" :resource="$business_field">
                    <li class="text-gray-800 hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                        @click="$store.selection.resource($el, {{ $package->toJson() }}); visible = false"
                    >
                        {{ ucwords(__(business.create.type))}}
                    </li>
                </x-select>

                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Email -->

        <!-- begin::Phone -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="phone" :value="__('page.business-fields.form.phone.label')" />

                <x-input
                    type="text" name="phone" value="{{ $business_field->phone }}" dir="ltr"
                    class="w-full mt-1 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}"
                    placeholder="{{ __('page.business-fields.form.phone.placeholder') }}"
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
                <x-label for="address" :value="__('page.business_fields.form.address.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="address" value="{{ $business_field->address }}"
                    placeholder="{{ __('page.business_fields.form.address.placeholder') }}"
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
                <x-label for="business_field" :value="__('page.business_fields.form.business_field.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="business_field" value="{{ $business_field->business_field }}"
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
                <x-label for="domain" :value="__('page.business_fields.form.domain.label')" />

                <x-input
                    type="text" class="w-full mt-1" name="domain" value="{{ $business_field->domain->domain }}"
                    placeholder="{{ __('page.business_fields.form.domain.placeholder') }}"
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

                <x-actions.back href="{{ route('business_fields.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
