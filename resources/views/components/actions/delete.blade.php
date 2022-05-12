@props(['action'])

<x-modal>
    <x-slot name="trigger">
        <x-button
            type="button"
            @click="isOpen = ! isOpen"
            bgColor="bg-red-200/50 hover:bg-red-200"
            size="px-3 py-1"
            textColor="text-red-600"
            {{ $attributes->merge(['class' => 'text-red-600']) }}
        >
            {{ __('actions.delete.page') }}
        </x-button>
    </x-slot>

    <!-- begin::Delete Form -->
    <form method="POST" action="{{ $action }}" class="mt-6 space-y-8">
        @csrf
        @method('DELETE')

        <!-- begin::Form Content -->
        <div class="flex flex-col items-center justify-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>

            <p class="text-lg font-bold text-center text-gray-800 mt-2">
                {{ __('actions.delete.warning.title') }}
            </p>
            <p class="text-sm text-center text-gray-400 mt-2">
                {{ __('actions.delete.warning.sentence') }}
            </p>
        </div>
        <!-- end::Form Content -->

        <!-- begin::Form Button -->
        <div class="flex justify-center">
            <x-button
                bgColor="bg-red-400 hover:bg-red-500"
                textColor="text-white"
            >
                {{ __('actions.delete.form') }}
            </x-button>
        </div>
        <!-- end::Form Button -->
    </form>
    <!-- end::Delete Form -->
</x-modal>
