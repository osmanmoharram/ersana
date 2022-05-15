<x-app-layout>
    <x-slot name="header" class="py-6">
        {{ __('page.roles.show.header', ['role' => __('roles.' . $role->name)])  }}
    </x-slot>

    <div class="space-y-4 pb-8">
        <!-- begin::Permissions -->
        <div x-data class="grid grid-cols-2">
            <div class="col-span-1">
                <x-label for="permissions" :value="__('permissions.title')" />

                <div class="hidden lg:flex flex-col mt-2">
                    <div class="-my-2 overflow-x-hidden">
                        <div class="py-2 align-middle inline-block min-w-full">
                            <div class="overflow-hidden shadow-sm sm:rounded-sm">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 space-s-3 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}
                                                text-xs font-medium text-gray-400 uppercase tracking-wider"
                                            >
                                                <span>
                                                    {{ __('permissions.label') }}
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($role->permissions as $permission)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center space-s-4 text-sm text-slate-500">
                                                        <span class="line-clamp-1 text-xs">
                                                            {{ __('permissions.' . $permission->name) }}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end::permissions -->

        <!-- begin::Form Button -->
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex items-center justify-between">
                <a
                    href="{{ route('roles.edit', $role->id) }}"
                    class="px-6 py-2 bg-slate-700 hover:bg-gray-800 border border-transparent rounded-sm
                    font-semibold text-xs text-slate-300 uppercase cursor-pointer focus:outline-none
                    disabled:opacity-25 transition ease-in-out duration-150"
                >
                    {{ __('actions.edit.page')}}
                </a>

                <x-actions.back href="{{ route('roles.index') }}"/>
            </div>
        </div>
        <!-- end::Form Button -->
    </div>
</x-app-layout>
