<div>
      <div>
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('product', $product) }}
      </div>

      <div>
            <div>
                  <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
                  <div class="flex items-center text-">
                        <x-stars-with-review :rating="$product->reviews_avg_rating" :numberOfReviews="$product->reviews_count" :typeReviews="true" />
                        <span class="mx-1">|</span>
                        @if ($product->stock)
                              <span class="text-sm text-green-500">In Stock</span>
                        @else
                              <span class="text-sm text-red-500">Out of Stock</span>
                        @endif
                  </div>
                  <x-price :price="$product->price" :discount="$product->discount" priceSize="2xl" discountSize="xl" />
                  <p class="w-96 mt-6">{{ $product->description }}</p>
            </div>
      </div>

</div>
