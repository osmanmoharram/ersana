<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.features.create.header') }}
    </x-slot>

    <form action="{{ route('features.update', $feature->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Description -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="name" :value="__('page.features.form.description.label')" />

                <textarea
                    name="description" rows="3"placeholder="{{ __('page.features.form.description.placeholder') }}"
                    class="shadow-sm mt-1 block w-full sm:text-sm border border-slate-300 rounded-sm
                    outline-none focus:outline-none focus:border-slate-300 focus:ring-0"
                >{{ $feature->description }}</textarea>

                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Description -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button class="px-8 py-3">
                    {{ __('actions.edit.page') }}
                </x-button>

                <a
                    href="{{ route('features.index') }}"
                    class="px-8 py-3 bg-gray-800 border border-transparent rounded-sm font-semibold
                    text-xs text-slate-300 uppercase hover:bg-gray-700 cursor-pointer active:bg-gray-900 focus:outline-none
                    disabled:opacity-25 transition ease-in-out duration-150"
                >
                    {{ __('actions.back') }}
                </a>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
