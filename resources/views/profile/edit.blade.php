<x-app-layout>
    <x-slot name="header"></x-slot>

    <form action="{{ route('profile.update') }}" method="POST" class="flex items-start" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <img src="{{ storage_path(auth()->user()->photo) }}" alt="Me" class="rounded-sm max-h-96">

            <label
                for="photo"
                class="block cursor-pointer mt-4 w-full py-2 text-center text-slate-500 rounded-sm border bg-white hover:bg-slate-50 transition duration-150 ease-in-out">

                Upload photo

                <input id="photo" type="file" name="photo" class="sr-only" accept=".png,.jpg,.jpeg">
            </label>
        </div>

        <div class="space-y-4 ms-16">
            <a href="{{ route('profile.show') }}" class="inline-block text-slate-500 text-sm hover:underline">{{ __('Back') }}</a>
            <div>
                <x-label for="name" value="{{ __('Name') }}" />

                <x-input id="name" type="text" name="name" value="{{ auth()->user()->name }}"/>
            </div>

            <div>
                <x-label for="phone" value="{{ __('Phone') }}" />

                <x-input id="phone" type="text" name="phone" placeholder="{{ __('Enter phone number') }}" value="{{ auth()->user()->phone }}"/>
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />

                <x-input id="password" type="password" name="password" placeholder="{{ __('Enter new Password') }}" />
            </div>

            <div>
                <x-label for="password_confirmation" value="{{ __('Password Confirmation') }}" />

                <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="{{ __('Confirm new password') }}" />
            </div>

            <div>
                <button type="submit" class="px-4 py-2 rounded-sm bg-green-400 text-white hover:bg-green-500 transition duration-150 ease-in-out">Update</button>
            </div>
        </div>
    </form>
</x-app-layout>
