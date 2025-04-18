<div class="w-[270px] h-[350px] relative group">
      <div class="absolute top-1 right-1 rounded-full p-1 z-10 hover:cursor-pointer"
           x-data="{ loading: false }" 
           wire:click="toggleFavorite"
           @click.stop="loading = true"
           @wire:loading.remove 
           @wire:target="toggleFavorite"
           wire:loading.attr="disabled">
          @if (!$isFavorite)
              <span class="material-symbols-outlined">favorite</span>
          @else
              <svg xmlns="http://www.w3.org/2000/svg" height="28px" width="28px" viewBox="0 -960 960 960" fill="#ef4444">
                  <path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Z"/>
              </svg>
          @endif
      </div>
  
      <a class="h-[250px] w-full bg-gray-200 relative flex items-center justify-center block" href="{{ route('product.show', $product->id) }}" wire:navigate>
          @if ($product->discount > 0)
              <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded">
                  {{ $product->discount }}%
              </div>    
          @endif
          <img src="{{ asset('storage/images/keyboard.png') }}" class="max-w-60" alt="">
      </a>
  
      <div class="mt-4 font-medium">
          <h1>{{ $product->name }}</h1>
          <div class="flex gap-3">
              <h1 class="font-medium text-red-500">{{ number_format($product->price - (($product->price * $product->discount) / 100), 2) }}$</h1>
              <h1 class="line-through text-gray-500">{{ $product->price }}$</h1>
          </div> 
          <x-stars-with-review :rating="$product->reviews_avg_rating" :numberOfReviews="$product->reviews_count"/>          
  
      </div>
  </div>