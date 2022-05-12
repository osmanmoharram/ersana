<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.permissions.index.header') }}

        <x-actions.add href="{{ route('permissions.create') }}" />
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="permissions" :columns="['name']">
        @foreach ($permissions as $permission)
            <tr>
                <!-- begin::Name -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center space-s-2 text-sm font-medium text-gray-800">
                        <span class="block">{{ $permission->name }}</span>
                    </div>
                </td>
                <!-- end::Name -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-s-0.5 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('permissions.edit', $permission->id) }}" />
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete :action="route('permissions.destroy', $permission->id)" />
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $permissions->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->

</x-app-layout>
