<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.businessFields.index.header') }}

        <!-- begin::Add -->
        <x-actions.add href="{{ route('business-fields.create') }}" />
        <!-- end::Add -->
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="businessFields" :columns="['field', 'type']">
        @foreach ($businessFields as $field)
            <tr>
                <!-- begin::Field -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $field->name }}
                    </div>
                </td>
                <!-- end::Field -->

                <!-- begin::Type -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ __('page.businessFields.types.' . $field->type) }}
                    </div>
                </td>
                <!-- end::Type -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-s-1 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('business-fields.edit', $field->id) }}"/>
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete action="{{ route('business-fields.destroy', $field->id) }}"/>
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $businessFields->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-app-layout>
