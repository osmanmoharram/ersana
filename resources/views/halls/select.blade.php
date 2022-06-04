<x-hall-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.halls.index.header') }}
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    @foreach ($halls as $hall)
    <a href="{{ route('halls.dashboard', $hall->id) }}" class="block">
        {{ $hall->name }}
    </a>
    @endforeach
    <!-- end::Page Content -->
</x-hall-layout>
