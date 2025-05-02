<div class="w-[270px] h-[350px] relative group">
      <button class="absolute top-1 right-1 rounded-full p-1 z-10 bg-white w-9 h-9 flex justify-center items-center"
            wire:click="deleteProductFromWishlist({{$product->id}})">
            @if ($this->wishlist)
                  <span class="material-symbols-outlined text-md text-red-500">
                        delete
                  </span>
            @else
                  <livewire:favorite-button :key="$product->id" :productId="$product->id">
            @endif
      </button>
      <a class="h-[250px] w-full bg-gray-200 relative flex items-center justify-center block"
            href="{{ route('product.show', $product->id) }}" wire:navigate>
            @if ($product->discount > 0)
                  <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded">
                        {{ $product->discount }}%
                  </div>
            @endif
            <img src="{{ asset('images/keyboard.png') }}" class="max-w-60" alt="">
      </a>
      @if ($this->wishlist)
            <button wire:click="addToCart({{$product->id}})"
                  class="h-10 w-full bg-black text-white text-sm absolute bottom-24 flex justify-center items-center 
                  gap-2 hover:bg-gray-800 transition duration-300">
                  <span class="material-symbols-outlined">
                        shopping_cart
                  </span>
                  <span>Add to Cart</span>
            </button>
      @endif
      <div class="mt-4 font-medium">
            <h1>{{ $product->name }}</h1>
            <x-price :price="$product->price" :discount="$product->discount" />
            <x-stars-with-review :rating="$product->reviews_avg_rating" :numberOfReviews="$product->reviews_count" />
      </div>
</div>
