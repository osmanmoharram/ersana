<x-app-layout>
    <x-slot name="header"></x-slot>

    <form action="{{ route('profile.update') }}" method="POST" class="flex items-start" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <img src="{{ asset('storage/' . substr(auth()->user()->photo, 6)) }}" alt="Me" class="rounded-sm max-w-xs">

            <label for="photo" class="block cursor-pointer mt-4 w-full py-2 text-center text-slate-500 rounded-sm border bg-white hover:bg-slate-50 transition duration-150 ease-in-out">
                {{ __('page.profile.photo')}}

                <input id="photo" type="file" name="photo" class="sr-only" accept=".png,.jpg,.jpeg">
            </label>
        </div>

        <div class="space-y-4 ms-16">
            <a href="{{ route('profile.show') }}" class="inline-block text-slate-500 text-sm hover:underline">
                {{ __('page.profile.back') }}
            </a>

            <div>
                <x-label for="name" value="{{ __('page.profile.name') }}" />

                <x-input id="name" type="text" name="name" value="{{ auth()->user()->name }}"/>
            </div>

            <div>
                <x-label for="phone" value="{{ __('page.profile.phone') }}" />

                <x-input id="phone" type="text" name="phone" placeholder="{{ __('Enter phone number') }}" value="{{ auth()->user()->phone }}"/>
            </div>

            <div>
                <x-label for="password" value="{{ __('page.profile.password') }}" />

                <x-input id="password" type="password" name="password" placeholder="{{ __('Enter new Password') }}" />
            </div>

            <div>
                <x-label for="password_confirmation" value="{{ __('page.profile.confirm_password') }}" />

                <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="{{ __('Confirm new password') }}" />
            </div>

            <div>
                <button type="submit" class="px-4 py-2 rounded-sm bg-green-400 text-white hover:bg-green-500 transition duration-150 ease-in-out">
                    {{ __('page.profile.update') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
