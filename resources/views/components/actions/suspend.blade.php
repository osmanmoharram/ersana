<!-- begin::Activate Form -->
<form {{ $attributes->merge(['method' => 'POST']) }}>
    @csrf
    @method('PATCH')

    <input type="hidden" name="action" value="suspend">

    <!-- begin::Form Button -->
    <div class="flex justify-center">
        <x-button
            bgColor="bg-yellow-200/50 hover:bg-yellow-200"
            size="px-3 py-1"
            textColor="text-yellow-600"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
            </svg>
        </x-button>
    </div>
    <!-- end::Form Button -->
</form>
<!-- end::Activate Form -->
