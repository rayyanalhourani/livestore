<div>
      {{-- header --}}
      <div class="flex">
            <div class="border-r-2 flex flex-col gap-4 w-72 pt-12">
                  @foreach ($this->categories as $category)
                        <a href="/categories/{{ $category->slug }}" class="font-Poppins">
                              {{ $category->name }}
                        </a>
                  @endforeach
            </div>
            <div class="pt-12 grow flex justify-center">
                  <img src="http://picsum.photos/seed/{{ rand(0, 100000) }}/900/350" alt="">
            </div>
      </div>

      {{-- Products --}}
      <div class="mt-28">
            {{-- Sales cards --}}
            <div>
                  <div class="flex items-center gap-3">
                        <div class="w-5 h-10 rounded-md bg-red-500"></div>
                        <h1 class="text-red-500 font-semibold">Today’s</h1>
                  </div>
                  <h1 class="my-6 text-4xl">Flash Sales</h1>
                  <div class="flex gap-5 flex-wrap">
                        @foreach ($this->discountProducts as $product)
                            @livewire('product-card',['product'=>$product])
                        @endforeach
                  </div>
            </div>
      </div>
</div>
