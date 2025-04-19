@props(['price', 'discount' => 0, 'fontSize' => 'base'])

@php
      $priceClass = "font-medium text-red-500 text-$fontSize";
      $discountClass = "line-through text-gray-500 text-$fontSize";
@endphp

<div class="flex gap-3 items-center text-">
      @if ($discount)
            <h1 class="{{ $priceClass }}">
                  {{ number_format($price - ($price * $discount) / 100, 2) }}$</h1>
            <h1 class="{{ $discountClass }}">{{ $price }}$</h1>
      @else
            <h1 class="{{ $priceClass }}">{{ $price }}$</h1>
      @endif
</div>
