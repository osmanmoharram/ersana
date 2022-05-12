<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.permissions.create.header') }}
    </x-slot>

    <form action="{{ route('permissions.store') }}" method="POST" class="space-y-4 pb-8">
        @csrf

        <!-- begin::Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.permissions.form.name.label')" />

                <div>
                    <x-input
                        type="text" class="w-full" name="name" value="{{ old('name') }}"
                        placeholder="{{ __('page.permissions.form.name.placeholder') }}"
                    />

                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
             </div>
        </div>
        <!-- end::Name -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('permissions.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
