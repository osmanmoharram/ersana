<a
    {{
        $attributes->merge(
            [
                'class' => 'px-6 py-2 bg-slate-700 hover:bg-gray-800 border border-transparent rounded-sm
                font-semibold text-xs text-slate-300 uppercase cursor-pointer focus:outline-none
                disabled:opacity-25 transition ease-in-out duration-150'
            ]
        )
    }}
>
    {{ __('actions.back')}}
</a>
