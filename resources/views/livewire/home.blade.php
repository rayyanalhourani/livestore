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
            <div x-data="{
                slides: [{
                        imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
                        imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
                        title: 'Front end developers',
                        description: 'The architects of the digital world, constantly battling against their mortal enemy – browser compatibility.',
                    },
                    {
                        imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
                        imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
                        title: 'Back end developers',
                        description: 'Because not all superheroes wear capes, some wear headphones and stare at terminal screens',
                    },
                    {
                        imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
                        imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
                        title: 'Full stack developers',
                        description: 'Where &quot;burnout&quot; is just a fancy term for &quot;Tuesday&quot;.'
                    },
                ],
                currentSlideIndex: 1,
                previous() {
                    if (this.currentSlideIndex > 1) {
                        this.currentSlideIndex = this.currentSlideIndex - 1
                    } else {
                        // If it's the first slide, go to the last slide           
                        this.currentSlideIndex = this.slides.length
                    }
                },
                next() {
                    if (this.currentSlideIndex < this.slides.length) {
                        this.currentSlideIndex = this.currentSlideIndex + 1
                    } else {
                        // If it's the last slide, go to the first slide    
                        this.currentSlideIndex = 1
                    }
                },
            }" class="relative w-full overflow-hidden">
                  <!-- previous button -->
                  <button type="button"
                        class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                        aria-label="previous slide" x-on:click="previous()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                              stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                  </button>
                  <!-- next button -->
                  <button type="button"
                        class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                        aria-label="next slide" x-on:click="next()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                              stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                  </button>
                  <!-- slides -->
                  <!-- Change min-h-[50svh] to your preferred height size -->
                  <div class="relative min-h-[50svh] w-full">
                        <template x-for="(slide, index) in slides">
                              <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                                    x-transition.opacity.duration.1000ms>
                                    <!-- Title and description -->
                                    <div
                                          class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-linear-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                                          <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white"
                                                x-text="slide.title"
                                                x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                                          <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300"
                                                x-text="slide.description"
                                                x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                                    </div>

                                    <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                                          x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                              </div>
                        </template>
                  </div>
                  <!-- indicators -->
                  <div class="absolute rounded-sm bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2"
                        role="group" aria-label="slides">
                        <template x-for="(slide, index) in slides">
                              <button class="size-2 rounded-full transition" x-on:click="currentSlideIndex = index + 1"
                                    x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-300' : 'bg-neutral-300/50']"
                                    x-bind:aria-label="'slide ' + (index + 1)"></button>
                        </template>
                  </div>
            </div>
      </div>
      <div class="mt-28 flex flex-col gap-20">
            <div x-data="{ scroll: $refs.scrollContainer }">
                  <div class="flex justify-between items-center">
                        <x-section-header title="Today’s" header="Flash Sales" />
                        <div class="w-30">
                              <button @click="scroll.scrollLeft -= 300">
                                    <x-heroicon-s-arrow-left-circle class="h-12 w-12 text-gray-300" />
                              </button>
                              <button @click="scroll.scrollLeft += 300">
                                    <x-heroicon-s-arrow-right-circle class="h-12 w-12 text-gray-300" />
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
            <div x-data="{ scroll: $refs.catScrollContainer }">
                  <div class="flex justify-between items-center">
                        <x-section-header title="Categories" header="Browse By Category" />
                        <div class="w-30">
                              <button @click="scroll.scrollLeft -= 300">
                                    <x-heroicon-s-arrow-left-circle class="h-12 w-12 text-gray-300" />
                              </button>
                              <button @click="scroll.scrollLeft += 300">
                                    <x-heroicon-s-arrow-right-circle class="h-12 w-12 text-gray-300" />
                              </button>
                        </div>
                  </div>
                  <div class="relative">
                        <div x-ref="catScrollContainer"
                              class="flex gap-5 overflow-x-auto scroll-smooth snap-x px-6 py-2 scrollbar-hide"">
                              @foreach ($this->categories as $category)
                                    <x-category-card :category="$category" />
                              @endforeach
                        </div>
                  </div>
            </div>
            <div>
                  <x-section-header title="This Month" header="Best Selling Products" />
                  <div class="flex gap-5 flex-wrap items-center justify-center">
                        @foreach ($this->bestSelling as $product)
                              <livewire:product-card :key="$product->id" :product="$product" />
                        @endforeach
                  </div>
            </div>
            <div>
                  <x-section-header title="Our Products" header="Explore Our Products" />
                  <div class="flex gap-5 flex-wrap items-center justify-center">
                        @foreach ($this->ourProducts as $product)
                              <livewire:product-card :key="$product->id" :product="$product" />
                        @endforeach
                  </div>
                  <div class="flex justify-center mt-6 mb-10">
                        <x-button class="font-medium w-64">
                              <a href="/products">View All Products</a>
                        </x-button>
                  </div>
            </div>
      </div>
</div>
