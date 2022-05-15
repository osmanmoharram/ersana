<x-hall-layout>
    <x-slot name="header">
        {{ __('page.halls.index.header') }}

        <!-- begin::Add -->
        <x-actions.add href="{{ route('client.halls.create') }}" />
        <!-- end::Add -->
    </x-slot>

    <div class="grid grid-cols-4 gap-6 pt-2">
        @foreach ($halls as $hall)
            <!-- begin::Hall -->
            <div class="flex flex-col">
                <!-- begin::Hall Header -->
                <div class="flex items-center justify-between border-t border-slate-100 p-3 border-b ">
                    <a href="{{ route('client.halls.show', $hall->id) }}" class="text-sm text-slate-500 tracking-wide hover:underline">
                        {{ $hall->name }}
                    </a>
                </div>
                <!-- end::Hall Header -->

                <!-- begin::Hall Body -->
                <a href="{{ route('client.halls.show', $hall->id) }}" class="flex-1 flex items-center justify-center text-slate-300 hover:bg-slate-200/30 hover:border border-slate-200/50 transition duration-150 ease-in-out">
                    <img src="{{ asset('img/hall3.png') }}" alt="Hall">
                </a>
                <!-- end::Hall Body -->

                <!-- begin::Hall Footer -->
                <div class="p-2 mt-2">
                    <!-- begin::Actions -->
                    <div class="flex items-start justify-between">
                        <!-- begin::Edit -->
                        <x-actions.edit class="border border-slate-300" href="{{ route('client.halls.edit', $hall->id) }}" />
                        <!-- end::Edit -->

                        <!-- begin::Delete -->
                        <x-actions.delete class="border border-red-300" :action="route('client.halls.destroy', $hall->id)" />
                        <!-- end::Delete -->
                    </div>
                    <!-- end::Actions -->
                </div>
                <!-- end::Hall Footer -->
            </div>
            <!-- end::Hall -->
        @endforeach
    </div>
</x-hall-layout>
