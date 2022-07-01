<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="flex flex-col items-start sm:space-s-16">
        <div class="hidden">
            <img src="{{ asset('storage/' . substr(auth()->user()->photo, 6)) }}" alt="Me" class="rounded-sm w-[220px;]">

            <a href="{{ route('profile.edit') }}" class="py-2 px-4 text-center text-slate-500 border bg-white block mt-4 hover:bg-slate-50 transition duration-150 ease-in-out">
                {{ __('page.profile.edit') }}
            </a>
        </div>
        <div class="space-y-4">
            <div>
                <span class="text-slate-400 block text-base">
                    {{ __('page.profile.name') }}&colon;
                </span>
                <span class="text-slate-500 block text-base">
                    {{ auth()->user()->name }}
                </span>
            </div>
            <div>
                <span class="text-slate-400 block text-base">
                    {{ __('page.profile.email') }}&colon;
                </span>
                <span class="text-slate-500 block text-base">
                    {{ auth()->user()->email }}
                </span>
            </div>
            <div>
                <span class="text-slate-400 block text-base">
                    {{ __('page.profile.phone') }}&colon;
                </span>
                <span class="text-slate-500 block text-base {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}" dir="ltr">
                    {{ auth()->user()->phone }}
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
