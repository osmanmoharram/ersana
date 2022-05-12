<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.features.index.header') }}

        <!-- begin::Add -->
        <x-actions.add href="{{ route('features.create') }}" />
        <!-- end::Add -->
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="features" :columns="['description']">
        @foreach ($features as $feature)
            <tr>
                <!-- begin::Description -->
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $feature->description }}
                    </div>
                </td>
                <!-- end::Description -->

                <!-- begin::Actions -->
                <td class="px-6 py-3 whitespace-nowrap text-right text-sm space-s-1 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('features.edit', $feature->id) }}" />
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete :action="route('features.destroy', $feature->id)" />
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $features->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-app-layout>

