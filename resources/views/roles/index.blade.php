<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.roles.index.header') }}
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="roles" :columns="['name']">
        @foreach ($roles as $role)
            <tr>
                <!-- begin::Name -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center space-s-2 text-sm font-medium text-gray-800">
                        <span class="block">{{ __('roles.' . $role->name) }}</span>
                    </div>
                </td>
                <!-- end::Name -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-s-1 flex items-center justify-end">
                    <!-- begin::Show -->
                    <x-actions.show href="{{ route('roles.show', $role->id) }}" />
                    <!-- end::Show -->

                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('roles.edit', $role->id) }}" />
                    <!-- end::Edit -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $roles->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->

</x-app-layout>
