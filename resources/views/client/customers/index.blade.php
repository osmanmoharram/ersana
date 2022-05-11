<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.customers.index.header') }}
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="customers" :columns="['name', 'company', 'email', 'phone', 'address']">
        @foreach ($customers as $customer)
            <tr>
                <!-- begin::Full Name -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $customer->name }}
                    </div>
                </td>
                <!-- end::Full Name -->

                <!-- begin::Email -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $customer->email }}
                    </div>
                </td>
                <!-- end::Email -->

                <!-- begin::Phone -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm {{ app()->getLocale() === 'ar' ? 'text-right' : '' }} text-slate-500" dir="ltr">
                        {{ $customer->phone }}
                    </div>
                </td>
                <!-- end::Phone -->

                <!-- begin::Address -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm {{ app()->getLocale() === 'ar' ? 'text-right' : '' }} text-slate-500">
                        {{ $customer->address }}
                    </div>
                </td>
                <!-- end::Address -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-s-0.5 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('customers.edit', $customer->id) }}"/>
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete action="{{ route('customers.destroy', $customer->id) }}"/>
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $customers->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-app-layout>
