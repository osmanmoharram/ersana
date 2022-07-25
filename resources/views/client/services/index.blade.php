<x-app-layout>
    <!-- begin::Page Heading -->
    <x-slot name="header" class="py-6">
        {{ __('page.services.index.header') }}

        <x-actions.add href="{{ route('halls.services.create', session('hall')->id) }}" />
    </x-slot>
    <!-- end::Page Heading -->

    <!-- begin::Page Content -->
    <x-table page="services" :columns="['description', 'price']">
        @foreach ($services as $service)
            <tr>
                <!-- begin::Description -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ $service->description }}
                    </div>
                </td>
                <!-- end::Description -->

                <!-- begin::Price -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm  text-slate-500">
                        {{ number_format($service->price, 2) }}
                    </div>
                </td>
                <!-- end::Price -->

                <!-- begin::Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-s-1 flex items-center justify-end">
                    <!-- begin::Edit -->
                    <x-actions.edit href="{{ route('halls.services.edit', ['hall' => session('hall')->id, 'service' => $service->id]) }}"/>
                    <!-- end::Edit -->

                    <!-- begin::Delete -->
                    <x-actions.delete action="{{ route('halls.services.destroy', ['hall' => session('hall')->id, 'service' => $service->id]) }}"/>
                    <!-- end::Delete -->
                </td>
                <!-- end::Actions -->
            </tr>
        @endforeach

        <x-slot name="pagination">
            {{ $services->links() }}
        </x-slot>
    </x-table>
    <!-- begin::Page Content -->
</x-app-layout>
