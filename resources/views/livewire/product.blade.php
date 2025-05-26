<div>
      <div class="my-6">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('product', $product) }}
      </div>

      <div class="flex justify-center">
            <div class="flex flex-col gap-4 mr-7">
                  @for ($i = 0; $i < 4; $i++)
                        <div class="h-[138px] w-[170px] bg-gray-100 flex items-center justify-center">
                              <img src="{{ asset('storage/images/keyboard.png') }}" class="px-4" alt="">
                        </div>
                  @endfor
            </div>
            <div class="h-[600px] w-[500px] bg-gray-100 flex items-center justify-center mr-16">
                  <img src="{{ asset('storage/images/keyboard.png') }}" class="px-6" alt="">
            </div>
            <div>
                  <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
                  <div class="flex items-center my-4">
                        <x-stars-with-review :rating="$rating" :numberOfReviews="$numberOfReviews" :typeReviews="true" />
                        <span class="mx-1">|</span>
                        @if ($product->stock)
                              <span class="text-sm text-green-500">In Stock</span>
                        @else
                              <span class="text-sm text-red-500">Out of Stock</span>
                        @endif
                  </div>
                  <x-price :price="$product->price" :discount="$product->discount" fontSize="2xl" />
                  <p class="w-96 mt-4 text-sm">{{ $product->description }}</p>
                  <div class="flex items-center gap-4 mt-5">
                        <div class="w-40 h-11 flex items-center justify-center border border-black/50 rounded"
                              x-data="{ quantity: @entangle('quantity'), max: {{ $product->stock }} }">
                              <button class="w-1/3 h-full flex items-center justify-center"
                                    @click="if (quantity > 1) quantity--">
                                    <span class="material-symbols-outlined text-2xl">remove</span>
                              </button>
                              <div
                                    class="w-2/3 h-full flex items-center justify-center text-2xl font-medium border-x border-black/20">
                                    <span x-text="quantity"></span>
                              </div>
                              <button class="w-1/3 h-full flex items-center justify-center bg-red-500"
                                    @click="if (quantity < max) quantity++">
                                    <span class="material-symbols-outlined text-2xl text-white">add</span>
                              </button>
                        </div>

                        <button class="w-40 h-11 bg-red-500 text-white rounded" wire:click="addToCart">
                              Add to Cart
                        </button>

                        <div class="h-11 w-11 flex items-center justify-center rounded-lg">
                              <livewire:favorite-button :key="$product->id" :productId="$product->id" size="10">
                        </div>
                  </div>
            </div>
      </div>
      <div class="my-20 border-t-2">
            <div class="flex gap-2 my-8 items-baseline">
                  <h1 class="text-2xl font-bold">All Reviews </h1>
                  <span class="text-black/50">({{ $product->reviews_count }})</span>
            </div>
            <div class="flex flex-wrap justify-center items-center gap-8">
                  @foreach ($product->reviews as $review)
                        <div class="w-[610px] h-60 border-2 px-8 py-8 rounded-xl flex flex-col justify-between">
                              <div>
                                    <x-stars-with-review :rating="$review->rating" :typeCount="false" size="24" />
                                    <span class="text-xl font-bold">{{ $review->user->name }}</span>
                                    <p class="font-Satoshi text-black/60">"{{ $review->comment }}"</p>
                              </div>
                              <span class="font-Satoshi text-black/60 font-bold">Posted on {{ date('F j, Y', strtotime($review->created_at)) }}</span>
                        </div>
                  @endforeach
            </div>
      </div>
      <div class="my-32">
            <x-section-header title="Related Itmes" />
            <div class="flex gap-5 flex-wrap mt-6">
                  @foreach ($this->relatedProducts as $product)
                        <livewire:product-card :key="$product->id" :product="$product">
                  @endforeach
            </div>
      </div>
</div>
