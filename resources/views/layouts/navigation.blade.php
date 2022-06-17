<nav x-data="{ open: false }" class="bg-slate-50 border-b border-gray-200">
    <!-- begin::Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center {{ session()->has('hall') ? 'justify-between' : 'sm:justify-end' }} h-16">
            <x-application-logo class="h-8 sm:hidden" />

            @if (session()->has('hall'))
                <div class="flex items-center space-s-4">
                    <span class="text-lg">
                        {{ app()->getLocale() === 'ar' ? 'قاعة: ' . session('hall')->name : 'Hall: ' . session('hall')->name }}
                    </span>

                    <a href="{{ route('halls.index') }}" class="hidden sm:block text-slate-400 hover:text-slate-500 transition duration-150 ease-in-out" title="{{ app()->getLocale() === 'ar' ? 'العودة إلى القاعات' : 'Go back to halls' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            @endif

            <div class="hidden justify-between space-s-6 sm:flex sm:items-center">
                <!-- begin::Notifications -->
                <x-dropdown align="{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}">
                    <x-slot name="trigger">
                        <div class="relative">
                            @if (auth()->user()->unreadNotifications()->count())
                                <div class="w-2 h-2 bg-red-500 rounded-full absolute"></div>
                            @endif

                            <button class="flex items-center text-sm font-medium text-slate-400 hover:text-slate-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <x-dropdown-link :href="route('halls.bookings.show', $notification->data['booking']['id'])">
                                Booking number {{ $notification->data['booking']['id'] }} is due in less than {{ $notification->data['days'] }}
                            </x-dropdown-link>
                        @empty
                            <p class="text-center p-2 text-sm text-slate-400">
                                {{ app()->getLocale() === 'ar' ? 'لا توجد إشعارات' : 'There are no notifications' }}
                            </p>
                        @endforelse
                    </x-slot>
                </x-dropdown>
                <!-- end::Notifications -->

                <!-- begin::Languages Links -->
                <div class="flex items-center divide-s divide-gray-400 pb-1">
                    <!-- begin::English -->
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="pe-3 block font-normal text-sm text-gray-700 text-opacity-50 hover:text-opacity-70 hover:underline tranisition duration-150 ease-in-out">English</a>
                    <!-- end::English -->

                    <!-- begin::Arabic -->
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="ps-3 block font-tajawal font-normal text-sm  text-gray-700 text-opacity-50 hover:text-opacity-70 hover:underline tranisition duration-150 ease-in-out">عربي</a>
                    <!-- end::Arabic -->
                </div>
                <!-- end::Languages Links -->

                <!-- begin::Settings Dropdown -->
                <x-dropdown align="{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="w-8 h-8 rounded-full bg-blue-500"></div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')">
                            {{ __('auth.profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();"
                            >
                                {{ __('auth.logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                <!-- end::Settings Dropdown -->
            </div>

            <!-- begin::Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- end::Hamburger -->
        </div>
    </div>
    <!-- end::Primary Navigation Menu -->

    <!-- begin::Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- begin::Dashboard -->
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('sidebar.dashboard') }}
            </x-responsive-nav-link>
            <!-- end::Dashboard -->

            <!-- begin::Subscriptions -->
            <x-responsive-nav-link :href="route('subscriptions.index')" :active="request()->routeIs('subscriptions')">
                {{ __('sidebar.subscriptions') }}
            </x-responsive-nav-link>
            <!-- end::Subscriptions -->

            <!-- begin::Packages -->
            <x-responsive-nav-link :href="route('packages.index')" :active="request()->routeIs('packages')">
                {{ __('sidebar.packages') }}
            </x-responsive-nav-link>
            <!-- end::Packages -->

            <!-- begin::Features -->
            <x-responsive-nav-link :href="route('features.index')" :active="request()->routeIs('features')">
                {{ __('sidebar.features') }}
            </x-responsive-nav-link>
            <!-- end::Features -->

            <!-- begin::Ads -->
            {{-- <x-responsive-nav-link :href="" :active="">
                {{ __('sidebar.ads') }}
            </x-responsive-nav-link> --}}
            <!-- end::Ads -->

            <!-- begin::Reports -->
            {{-- <x-responsive-nav-link :href="" :active="">
                {{ __('sidebar.reports') }}
            </x-responsive-nav-link> --}}
            <!-- end::Reports -->

            <!-- begin::Clients -->
            <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients')">
                {{ __('sidebar.clients') }}
            </x-responsive-nav-link>
            <!-- end::Clients -->

            <!-- begin::Business Fields -->
            <x-responsive-nav-link :href="route('business-fields.index')" :active="request()->routeIs('business-fields')">
                {{ __('sidebar.business-fields') }}
            </x-responsive-nav-link>
            <!-- end::Business Fields -->

            <!-- begin::Users -->
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users')">
                {{ __('sidebar.users') }}
            </x-responsive-nav-link>
            <!-- end::Users -->

            <!-- begin::Settings -->
            {{-- <x-responsive-nav-link :href="route('settings.index')" :active="request()->routeIs('settings')">
                {{ __('sidebar.settings') }}
            </x-responsive-nav-link> --}}
            <!-- end::Settings -->
        </div>

        <!-- begin::Languages Links -->
        <div class="border-t border-gray-200">
            <!-- begin::Arabic -->
            <a
                href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-sm font-medium text-slate-700 bg-slate-50 focus:outline-none focus:text-slate-800 focus:bg-slate-100 focus:border-slate-700 transition duration-150 ease-in-out"
            >عربي</a>
            <!-- end::Arabic -->

            <!-- begin::English -->
            <a
                href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-sm font-medium text-slate-700 bg-slate-50 focus:outline-none focus:text-slate-800 focus:bg-slate-100 focus:border-slate-700 transition duration-150 ease-in-out"
            >English</a>
            <!-- end::English -->
        </div>
        <!-- end::Languages Links -->

        <!-- begin::Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-sm text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <!-- begin::Settings -->
            <x-responsive-nav-link :href="route('halls.index')" :active="request()->route()->named('halls.index')" class="mt-2 ">
                <div class="flex items-center space-s-4">
                    <span class="block text-sm">
                        {{ app()->getLocale() === 'ar' ? 'العودة إلى القاعات' : 'Go back to halls' }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
            </x-responsive-nav-link>
            <!-- end::Settings -->

            <div class="space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();"
                    >
                        {{ __('auth.logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        <!-- end::Responsive Settings Options -->
    </div>
    <!-- end::Responsive Navigation Menu -->
</nav>
