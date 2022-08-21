<x-app-layout>
    <x-slot name="header"></x-slot>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="grid grid-cols-2 pb-8">
        <div class="col-span-1">
            <div class="bg-white shadow overflow-hidden rounded-sm">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $hall->name }}</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('page.halls.show.owner') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $hall->client->user->name }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('page.halls.show.city') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ __('cities.' . $hall->city) }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('page.halls.show.address') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ ($hall->address) }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('page.halls.show.capacity') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ ($hall->capacity) }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            @if ($hall->images)
                <div class="mt-5">
                    <h4 class="text-dm leading-6 font-medium text-gray-900">{{ __('page.halls.show.images') }}</h4>

                    <div class="grid grid-cols-3 gap-6 mt-2">
                        @foreach (json_decode($hall->images) as $image)
                            <img
                                src="{{ asset('storage/' . str_replace('public/', '', $image)) }}"
                                alt="{{ app()->getLocale() === 'ar' ? 'صورة' : 'Image' }}"
                            >
                        @endforeach
                    </div>
                </div>
            @else
                <div class="flex items-center justify-center h-56">
                    <div class="flex flex-col items-center">
                        <p class="text-slate-400 text-base">
                            {{ app()->getLocale() === 'ar' ? 'لا يوجد صور للقاعة' : 'The hall has no images' }}
                        </p>
                        <a
                            href="{{ route('halls.edit', $hall->id) }}"
                            class="mt-4 relative cursor-pointer bg-green-400 hover:bg-green-500 py-2 px-4 rounded-sm font-medium text-sm text-white focus-within:outline-none transition duration-150 ease-in-out"
                        >
                            {{ app()->getLocale() === 'ar' ? 'قم بإضافة صور' : 'Add Images' }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
