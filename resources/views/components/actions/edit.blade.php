@php
    $class = 'block px-3 py-1 bg-blue-200/50 hover:bg-blue-500 text-blue-500 hover:text-white border border-transparent
                    rounded-sm font-semibold font-normal text-xs uppercase focus:outline-none disabled:opacity-25
                    transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $class ]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
      </svg>
</a>
