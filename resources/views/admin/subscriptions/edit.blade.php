<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.subscriptions.edit.header', ['subscription' => $subscription->slug]) }}
    </x-slot>

    <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PATCH')

        <!-- begin::Package -->
        <div class="grid grid-cols-2">
            <div class="col-span-2 max-w-[560px]">
                <x-label for="package" :value="__('page.subscriptions.form.package.label')" />

                <x-select name="package_id" :display="$subscription->package->name" :value="$subscription->pakcage_id">
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
            <div class="col-span-2 max-w-[560px] flex items-center space-s-1">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('subscriptions.index') }}" />
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
