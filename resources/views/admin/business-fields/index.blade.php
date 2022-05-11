<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.business-fields.index.header') }}

        <!-- begin::Add -->
        <x-actions.add href="{{ route('business-fields.create') }}" />
        <!-- end::Add -->
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="business-fields" :columns="['field', 'type']">
        @foreach ($business_fields as $field)
            <tr>
                <!-- begin::Field -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $field->title }}
                    </div>
                </td>
                <!-- end::Field -->

                <!-- begin::Type -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $field->type }}
                    </div>
                </td>
                <!-- end::Type -->

                <!-- begin::Status -->
                <td class="px-6 py-3 whitespace-nowrap">
                    <div
                        class="inline-block text-xs px-2 py-0.5 rounded-full
                        {{
                            $subscription->status === 'active'
                                ? 'bg-green-200/50 text-green-600'
                                : 'bg-yellow-200/50 text-yellow-600'
                        }}"
                    >
                        {{ ucwords(__('status.' . $field->status)) }}
                    </div>
                </td>
                <!-- end::Status -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-s-0.5 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('business_fields.edit', $field->id) }}"/>
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete action="{{ route('business_fields.destroy', $field->id) }}"/>
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $business_fields->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-app-layout>
