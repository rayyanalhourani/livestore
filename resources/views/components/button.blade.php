<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-32 h-14 bg-red-500 text-white flex items-center justify-center rounded']) }} >
    {{ $slot }}
</button>
