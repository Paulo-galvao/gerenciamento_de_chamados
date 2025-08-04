<button
    {{ $attributes->merge([
        'class' =>
            'w-47 text-sm pl-4 py-2 cursor-pointer border-2 border-red-900 bg-red-700 text-white rounded-md hover:bg-red-600 duration-300 inline-flex items-center gap-2',
    ]) }}>
    <i class='bx  bx-x'></i>
    {{ $slot }}
</button>
