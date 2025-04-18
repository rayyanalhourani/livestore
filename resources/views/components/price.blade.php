@props(['price', 'discount' => 0, 'priceSize' => 'medium', 'discountSize' => 'normal'])

@php
      $priceClass = "font-medium text-red-500 text-$priceSize";
      $discountClass = "line-through text-gray-500 text-$discountSize";
@endphp

<div class="flex gap-3 items-center">
      @if ($discount)
            <h1 class="{{ $priceClass }}">
                  {{ number_format($price - ($price * $discount) / 100, 2) }}$</h1>
            <h1 class="{{ $discountClass }}">{{ $price }}$</h1>
      @else
            <h1 class="{{ $priceClass }}">{{ $price }}$</h1>
      @endif
</div>
