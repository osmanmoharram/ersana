@php
    $class = 'block px-3 py-1 bg-slate-200/50 hover:bg-slate-200 text-slate-500 border border-transparent
                    rounded-sm font-semibold font-normal text-xs uppercase focus:outline-none disabled:opacity-25
                    transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $class ]) }}>
    {{ __('actions.edit.page') }}
</a>
