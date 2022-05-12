<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.businessFields.create.header') }}
    </x-slot>

    <form action="{{ route('business-fields.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- begin::Title -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="name" :value="__('page.businessFields.form.name.label')" />

                <div>
                    <x-input
                        type="text" class="w-full" name="name" value="{{ old('name') }}"
                        placeholder="{{ __('page.businessFields.form.name.placeholder') }}"
                    />

                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
             </div>
        </div>
        <!-- end::title -->

        <!-- begin::Type -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="type" :value="__('page.businessFields.form.type.label')" />

                <x-select name="type" placeholder="{{ __('page.businessFields.form.type.placeholder') }}">
                    <li
                        class="text-gray-800 hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                        @click="$store.selection.select($el, 'advertisement'); visible = false"
                    >
                        {{ __('page.businessFields.types.advertisement') }}
                    </li>
                    <li
                        class="text-gray-800 hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                        @click="$store.selection.select($el, 'booking'); visible = false"
                    >
                        {{ __('page.businessFields.types.booking') }}
                    </li>
                </x-select>

                @error('type')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::type -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 pt-8">
            <div class="col-span-2 max-w-[560px] flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('business-fields.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
