<x-settings-layout>
    @if (Auth::user()->isClient())
        @error('no-setting')
            <p class="text-sm text-red-500 py-2">
                {{ $message }}
            </p>
        @enderror

        <p class="max-w-2xl leading-loose text-sm text-slate-400">
            عدد الأيام اللازمة و التي ستكون قبل موعد مناسبة الحجز لإرسال تنبيه لصاحب الحجز لدفع المبلغ المالي الذي عليه كاملاً في حال كان متبقي عليه جزء من المبلغ.
        </p>

        <form action="{{ route('halls.settings.update', ['hall' => session('hall')->id]) }}" method="POST" class="mt-4">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-3">
                <div class="col-span-1">
                    <x-input
                        name="days_before_booking_due_date" value="{{ $settings->where('name', 'days_before_booking_due_date')->first()->value }}"
                        class="w-full p-2 {{ $errors->has('days_before_booking_due_date') ? 'placeholder-red-500 border border-red-500' : 'placeholder-slate-300 border-none' }}"
                        placeholder="{{ $errors->has('days_before_booking_due_date') ? $errors->get('b')[0] : __(' الرجاء إدخال عدد الأيام') }}" />

                    @error('days_before_booking_due_date')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <x-button type="submit" class="block mt-6"> حفظ </x-button>
        </form>
    @else
        <div class="h-96 w-full flex items-center justify-center text-sm text-slate-400">
            {{ __('page.settings.greeting') }}
        </div>
    @endif
</x-settings-layout>
