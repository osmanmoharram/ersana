<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.business-fields.create.header') }}
    </x-slot>

    <form action="{{ route('business-fields.store') }}" method="POST" class="space-y-4 pb-8">
        @csrf

        <!-- begin::Title -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="title" :value="__('page.users.form.title.label')" />

                <div>
                    <x-input
                        type="text" class="w-full" title="title" value="{{ old('title') }}"
                        placeholder="{{ __('page.users.form.title.placeholder') }}"
                    />

                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
             </div>
        </div>
        <!-- end::title -->

        <!-- begin::Type -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="type" :value="__('page.business-fields.form.type.label')" />

                <x-select name="type">
                    <li
                        class="text-gray-800 hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                        @click="$store.selection.resource($el); visible = false"
                    >
                        {{ __('page.business-fields.types.advertisement') }}
                    </li>
                    <li
                        class="text-gray-800 hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                        @click="$store.selection.type($el, app()->getLocale()); visible = false"
                    >
                        {{ __('page.business-fields.types.booking') }}
                    </li>
                </x-select>

                @error('type')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::type -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('business-fields.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
