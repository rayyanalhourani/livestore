<div class="w-[270px] h-[350px] relative group">
      <div class="absolute top-1 right-1 rounded-full p-1 z-10 hover:cursor-pointer">
            <livewire:favorite-button :key="$product->id" :productId="$product->id">
      </div>
      <a class="h-[250px] w-full bg-gray-200 relative flex items-center justify-center block"
            href="{{ route('product.show', $product->id) }}" wire:navigate>
            @if ($product->discount > 0)
                  <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded">
                        {{ $product->discount }}%
                  </div>
            @endif
            <img src="{{ asset('storage/images/keyboard.png') }}" class="max-w-60" alt="">
      </a>

      <div class="mt-4 font-medium">
            <h1>{{ $product->name }}</h1>
            <x-price :price="$product->price" :discount="$product->discount" />
            <x-stars-with-review :rating="$product->reviews_avg_rating" :numberOfReviews="$product->reviews_count" />
      </div>
</div>
