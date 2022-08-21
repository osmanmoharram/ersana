<!-- begin::Activate Form -->
<form {{ $attributes->merge(['method' => 'POST']) }}>
    @csrf
    @method('PATCH')

    <input type="hidden" name="action" value="activate">

    <!-- begin::Form Button -->
    <div class="flex justify-center">
        <x-button
            bgColor="bg-green-200/50 hover:bg-green-200"
            textColor="text-green-600"
            class="px-3 py-1">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
        </x-button>
    </div>
    <!-- end::Form Button -->
</form>
<!-- end::Activate Form -->
