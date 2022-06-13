<x-settings-layout>
    <p class="max-w-2xl leading-relaxed text-sm text-slate-400">
        هنا سيتم تحديد عدد الأيام اللازمة و التي ستكون قبل موعد مناسبة الحجز لإرسال تنبيه لصاحب الحجز لدفع المبلغ المالي الذي عليه كاملاً في حال كان متبقي عليه جزء من المبلغ المالي.
    </p>

    <form action="{{ route('halls.bookings.notification-period', ['hall' => session('hall')->id]) }}" method="POST" class="mt-4">
        @csrf
        
        <div class="grid grid-cols-3">
            <div class="col-span-1">
                <x-input name="notification_period" class="w-full p-2 {{ $errors->has('notification_period') ? 'placeholder-red-500 border border-red-500' : 'placeholder-slate-300 border-none' }}" placeholder="{{ $errors->has('notification_period') ? $errors->get('notification_period')[0] : __(' الرجاء إدخال عدد الأيام') }}" />
            </div>
        </div>
        
        <x-button type="submit" class="block mt-6"> حفظ </x-button>
    </form>
    
</x-settings-layout>
