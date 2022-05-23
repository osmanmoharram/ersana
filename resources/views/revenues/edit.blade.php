<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.revenues.edit.header', ['revenue' => $revenue->id]) }}
    </x-slot>

    <form action="{{ route('revenues.update', $revenue->id) }}" method="POST" class="space-y-4 pb-8">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <div class="grid grid-cols-3 gap-x-6">
                    <!-- begin::Date -->
                    <div class="col-span-1">
                        <div class="flex items-center justify-between">
                            <x-label for="date" :value="__('page.revenues.form.date.label')" />

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <input
                            type="text" id="date" name="date" value="{{ $revenue->date }}" placeholder="{{ __('page.revenues.form.date.placeholder') }}"
                            class="w-full text-sm rounded-sm placeholder-slate-300 border-none cursor-pointer shadow-sm mt-2 outline-none focus:ring-0" readonly
                        />

                        @error('date')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Date -->

                    <!-- begin::Payment Method -->
                    <div class="col-span-1">
                        <x-label for="payment_method" :value="__('page.revenues.form.payment_method.label')" />

                        <x-select name="payment_method" value="{{ $revenue->payment_method }}" display="{{ __('page.revenues.form.payment_method.items.' . $revenue->payment_method) }}" placeholder="{{ __('page.revenues.form.payment_method.placeholder') }}">
                            @foreach (['cash', 'bank'] as $method)
                                <li
                                    class="text-gray-800 text-sm hover:bg-slate-50 cursor-pointer select-none py-2 ps-3 pe-9" role="option"
                                    @click="$store.selection.select($el, '{{ $method }}'); visible = false"
                                >
                                    {{ __('page.revenues.form.payment_method.items.' .  $method) }}
                                </li>
                            @endforeach
                        </x-select>

                        @error('payment_method')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Payment Method -->

                    <!-- begin::Amount -->
                    <div class="col-span-1">
                        <x-label for="amount" :value="__('page.revenues.form.amount.label')" />

                        <x-input
                            type="text" class="w-full" name="amount" value="{{ $revenue->amount }}"
                            placeholder="{{ __('page.revenues.form.amount.placeholder') }}"
                        />

                        @error('amount')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- end::Amount -->
                </div>
            </div>
        </div>

        <!-- begin::Description -->
        <div class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="description" :value="__('page.revenues.form.description.label')" />

                <x-textarea name="description" value="{{ $revenue->description }}" :placeholder="__('page.revenues.form.description.placeholder')" />

                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
             </div>
        </div>
        <!-- end::Description -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2 pt-8">
            <div class="col-span-1 flex items-center justify-between">
                <x-button>
                    {{ __('actions.edit.form')}}
                </x-button>

                <x-actions.back href="{{ route('revenues.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </form>
</x-app-layout>
