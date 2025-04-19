<div>
      {{-- header --}}
      <div class="flex">
            <div class="border-r-2 flex flex-col gap-4 w-72 pt-12">
                  @foreach ($this->categories as $category)
                        <a href="/categories/{{ $category->slug }}" class="font-Poppins hover:underline" wire:navigate>
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
                  <x-section-header title="Today’s" />
                  <h1 class="my-6 text-4xl">Flash Sales</h1>
                  <div class="flex gap-5 flex-wrap">
                        @foreach ($this->discountProducts as $product)
                        <livewire:product-card :key="$product->id" :product="$product">
                        @endforeach
                  </div>
            </div>
      </div>
</div>
