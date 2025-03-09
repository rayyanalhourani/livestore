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
</div>
