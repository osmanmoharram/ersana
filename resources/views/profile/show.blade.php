<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="flex items-start space-s-16">
        <div>
            <img src="{{ storage_path(auth()->user()->photo) }}" alt="Me" class="rounded-sm max-h-96">

            <a href="{{ route('profile.edit') }}" class="py-2 px-4 text-center text-slate-500 border bg-white block mt-4 hover:bg-slate-50 transition duration-150 ease-in-out">Edit Profile</a>
        </div>
        <div class="space-y-4">
            <div>
                <span class="text-slate-400 block text-xl">
                    {{ __('Name') }}&colon;
                </span>
                <span class="text-slate-500 block text-xl">
                    {{ auth()->user()->name }}
                </span>
            </div>
            <div>
                <span class="text-slate-400 block text-xl">
                    {{ __('Email') }}&colon;
                </span>
                <span class="text-slate-500 block text-xl">
                    {{ auth()->user()->email }}
                </span>
            </div>
            <div>
                <span class="text-slate-400 block text-xl">
                    {{ __('Phone') }}&colon;
                </span>
                <span class="text-slate-500 block text-xl">
                    {{ auth()->user()->phone }}
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
