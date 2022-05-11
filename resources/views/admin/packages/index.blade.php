<x-app-layout>
    <div class="pb-8">

        <!-- begin::Page Heading -->
        <x-slot name="header" class="py-6">
            {{ __('page.packages.index.header') }}

            <x-actions.add href="{{ route('packages.create') }}" />
        </x-slot>
        <!-- end::Page Heading -->

        <!-- begin::Page Content -->
        <div class="grid grid-cols-3 gap-6">
            @foreach ($packages as $package)
                <x-package :package="$package" />
            @endforeach
        </div>
        <!-- begin::Page Content -->
    </div>
</x-app-layout>

