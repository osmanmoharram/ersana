<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header">
        <span class="block">
            {{ __('page.dashboard') }}
        </span>

        <a href="{{ route('client.halls.index') }}" class="text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
    </x-slot>
    <!-- end::Page Heading -->

</x-app-layout>
