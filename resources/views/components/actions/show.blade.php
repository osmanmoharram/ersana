@php
    $class = 'block px-3 py-1 bg-indigo-200/50 hover:bg-indigo-500 text-indigo-500 hover:text-white border border-transparent
                    rounded-sm font-semibold font-normal text-xs uppercase focus:outline-none disabled:opacity-25
                    transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $class ]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
    </svg>
</a>

