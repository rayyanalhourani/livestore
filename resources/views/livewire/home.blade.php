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

      <div class="mt-28">
            <div x-data="{ scroll: $refs.scrollContainer }">
                  <div class="flex justify-between items-center">
                        <x-section-header title="Today’s" header="Flash Sales" />
                        <div class="w-30">
                              <button @click="scroll.scrollLeft -= 300">
                                    <x-heroicon-s-arrow-left-circle class="h-12 w-12 text-gray-300"/>
                              </button>
                              <button @click="scroll.scrollLeft += 300">
                                    <x-heroicon-s-arrow-right-circle class="h-12 w-12 text-gray-300"/>
                              </button>
                        </div>
                  </div>

                  <div class="relative">
                        <div x-ref="scrollContainer"
                              class="flex gap-5 overflow-x-auto scroll-smooth snap-x px-6 py-2 scrollbar-hide"">
                              @foreach ($this->discountProducts as $product)
                                    <livewire:product-card :key="$product->id" :product="$product" />
                              @endforeach
                        </div>
                  </div>
            </div>
            <div>
                  <x-section-header title="Categories" header="Browse By Category" />
                  <div class="flex gap-5 flex-wrap">
                        @foreach ($this->categories as $category)
                              <x-category-card :category="$category" />
                        @endforeach
                  </div>
            </div>
      </div>
</div>
