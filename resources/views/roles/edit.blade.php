<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.roles.edit.header') }}
    </x-slot>

    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Name -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.roles.form.name.label')" />

                <div>
                    <x-input
                        type="text" class="w-full" name="name" value="{{ $role->name }}"
                        placeholder="{{ __('page.roles.form.name.placeholder') }}"
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
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('roles.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
