<div>
      <div class="my-6">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('wishlist') }}
      </div>
      <div class="flex items-center justify-between">
            <span class="text-xl font-Satoshi">Wishlist ({{ $this->numberOfProducts }})</span>
            <button class="w-56 h-14 border rounded border-black/50">
                  Move All To Cart
            </button>
      </div>
      <div class="flex gap-5 flex-wrap mt-20">
            @foreach ($this->products as $product)
                  <livewire:product-card :key="$product->id" :product="$product" :wishlist="true">
            @endforeach
      </div>
</div>
