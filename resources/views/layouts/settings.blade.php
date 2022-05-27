<x-app-layout>
    <x-slot name="header">
        {{ __('page.settings.header')}}
    </x-slot>

    <div class="grid grid-cols-12 gap-x-12">

        <!-- begin::Sidebar -->
        <div class="col-span-2 hidden lg:block">
            <aside class="h-96 w-full bg-white flex flex-col overflow-y-auto">
                <div class="w-full hidden lg:block">
                    <!-- begin::Sidebar Links -->
                    <div class="py-6 space-y-6">
                        <!-- begin::Packages -->
                        <a href="{{ route('packages.index') }}" class="block text-sm ps-6 hover:underline">
                            {{ __('sidebar.packages') }}
                        </a>
                        <!-- end::Packages -->

                        <!-- begin::Features -->
                        <a href="{{ route('features.index') }}" class="block text-sm ps-6 hover:underline">
                            {{ __('sidebar.features') }}
                        </a>
                        <!-- end::Features -->

                        <!-- begin::Business Fields -->
                        <a href="{{ route('business-fields.index') }}" class="block text-sm ps-6 hover:underline">
                            {{ __('sidebar.business-fields') }}
                        </a>
                        <!-- end::Business Fields -->
                    </div>
                    <!-- end::Sidebar Links -->
                </div>
            </aside>
        </div>

        <div class="col-span-1 hidden sm:block lg:hidden">
            {{-- @include('layouts.responsive-sidebar') --}}
        </div>
        <!-- end::Sidebar -->

        <!-- begin::Content -->
        <div class="col-span-12 sm:col-span-11 lg:col-span-10">
            <div class="max-w-6xl mx-auto px-4">
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
        <!-- end::Page -->
    </div>

</x-app-layout>
