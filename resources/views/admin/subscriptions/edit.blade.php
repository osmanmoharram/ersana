<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.subscriptions.edit.header', ['subscription' => $subscription->slug]) }}
    </x-slot>

    <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <!-- begin::Package -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="package" :value="__('page.subscriptions.form.package.label')" />

                <x-select name="package" :resource="$subscription->package">
                    @foreach ($packages as $package)
                        <li class="text-gray-800 hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                            @click="$store.selection.resource($el, {{ $package->toJson() }}); visible = false"
                        >
                            {{ $package->name }}
                        </li>
                    @endforeach
                </x-select>

                @error('package')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- end::Package -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <x-button class="px-8 py-3">
                    {{ __('actions.edit.form')}}
                </x-button>

                <a
                    href="{{ route('subscriptions.index') }}"
                    class="px-8 py-3 bg-gray-800 border border-transparent rounded-sm font-semibold
                    text-xs text-slate-300 uppercase hover:bg-gray-700 cursor-pointer active:bg-gray-900 focus:outline-none
                    disabled:opacity-25 transition ease-in-out duration-150"
                >
                    {{ __('actions.back')}}
                </a>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
