<x-settings-layout>
    <!-- begin::Page Content -->
    <div class="flex items-center justify-between">
        <span class="block">
            {{ __('page.roles.index.header') }}
        </span>
    </div>

    <x-table page="roles" :columns="['name', 'permissions']">
        @foreach ($roles as $role)
            @if ($role->name !== 'admin')
                <tr>
                    <!-- begin::Description -->
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="text-sm  text-slate-500">
                            {{ __('page.roles.items.' . $role->name) }}
                        </div>
                    </td>
                    <!-- end::Description -->

                    <!-- begin::Permissions -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm  text-slate-500">
                            <x-modal>
                                <x-slot name="trigger">
                                    <a class="cursor-pointer hover:underline" @click="isOpen = ! isOpen">
                                        {{ __('permissions.title') }}
                                    </a>
                                </x-slot>

                                <ul class="divide-y space-y-2">
                                    @foreach ($role->permissions as $permission)
                                        <li> {{ __('permissions.' . $permission->name) }} </li>
                                    @endforeach
                                </ul>
                            </x-modal>
                        </div>
                    </td>
                    <!-- end::permissions -->

                    <!-- begin::Actions -->
                    <td class="px-6 py-3 whitespace-nowrap text-right text-sm space-s-1 flex items-center justify-end"></td>
                    <!-- end::Actions -->
                </tr>
            @endif
        @endforeach

        <x-slot name="pagination">
            {{ $roles->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-settings-layout>

