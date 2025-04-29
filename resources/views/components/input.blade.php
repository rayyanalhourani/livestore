@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-0 border-b-2 border-gray-300 focus:border-gray-500 focus:ring-0']) !!}>
