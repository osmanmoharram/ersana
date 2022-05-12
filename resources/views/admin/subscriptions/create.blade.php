<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.subscriptions.create.header') }}
    </x-slot>

    <form action="{{ route('subscriptions.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- begin::Client -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <div class="flex items-center justify-between">
                    <x-label for="client" :value="__('page.subscriptions.form.client.label')" />

                    <x-actions.add href="{{ route('clients.create') }}" size="p-1" />
                </div>

                <x-select name="client_id" placeholder="{{ __('page.subscriptions.form.client.placeholder') }}">
                    @foreach ($clients as $client)
                        <li
                            class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                            @click="$store.selection.select($el, '{{ $client->id }}'); visible = false"
                        >
                            {{ $client->user->name }}
                        </li>
                    @endforeach
                </x-select>

                @error('client')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Client -->

        <!-- begin::Package -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="package" :value="__('page.subscriptions.form.package.label')" />

                <x-select name="package_id" placeholder="{{ __('page.subscriptions.form.package.placeholder') }}">
                    @foreach ($packages as $package)
                        <li class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                            @click="$store.selection.select($el, '{{ $package->id }}'); visible = false"
                        >
                            {{ $package->name }}
                        </li>
                    @endforeach
                </x-select>

                @error('package_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Package -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 pt-8">
            <div class="col-span-2 max-w-[560px] flex items-center justify-between">
                <x-button>
                    {{ __('actions.add.form')}}
                </x-button>

                <x-actions.back href="{{ route('subscriptions.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
