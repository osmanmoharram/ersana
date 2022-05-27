<x-settings-layout>
    <div class="pb-8">
        <a href="{{ route('packages.create') }}" class="inline-block py-1 px-6 mb-6 rounded-sm bg-slate-900 text-slate-300 text-sm hover:bg-slate-800 transition duration-150 ease-in-out">
            {{ __('actions.add.page')}}
        </a>

        <!-- begin::Page Content -->
        <div class="grid grid-cols-3 gap-6">
            @foreach ($packages as $package)
                <x-package :package="$package" />
            @endforeach
        </div>
        <!-- begin::Page Content -->
    </div>
</x-settings-layout>

