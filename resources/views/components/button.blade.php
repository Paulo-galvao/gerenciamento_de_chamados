<button
    {{ $attributes->merge([
        'class' => 'my-5 text-sm px-4 py-2 cursor-pointer border-2 border-green-900 bg-green-700 text-white rounded-md hover:bg-green-600 duration-300 flex items-center gap-2'
    ])}}>
    <i class='bx  bx-plus'></i>
    {{ $slot }}
</button>
