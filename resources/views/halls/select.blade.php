<x-hall-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.halls.index.header') }}
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    @foreach ($halls as $hall)
        <a href="{{ route('halls.dashboard', $hall->id) }}" class="inline-flex flex-col items-center hover:bg-slate-200/50 py-2 transition duration-150 ease-in-out">
            <img src="{{ asset('img/hall.png') }}" alt="{{ $hall->name }}" class="h-44">
            <span class="mt-2">
                {{ $hall->name }}
            </span>
        </a>
    @endforeach
    <!-- end::Page Content -->
</x-hall-layout>
