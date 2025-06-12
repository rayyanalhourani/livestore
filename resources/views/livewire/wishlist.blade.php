<div>
      <div class="my-6">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('wishlist') }}
      </div>
      <div class="flex items-center justify-between">
            <span class="text-xl font-Satoshi">Wishlist ({{ $this->numberOfProducts }})</span>
            <button class="w-56 h-14 border rounded border-black/50 hover:bg-red-500 hover:text-white" wire:click='MoveAllToCart'>
                  Move All To Cart
            </button>
      </div>
            <div class="flex gap-5 flex-wrap mt-20">
                  @foreach ($this->favorites as $favorite)
                        <livewire:product-card :key="$favorite->product->id" :product="$favorite->product" :wishlist="true">
                  @endforeach
            </div>
</div>
