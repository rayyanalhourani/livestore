<div class="w-[270px] h-[350px]">
      <div class="h-[250px] w-full bg-gray-200 relative flex items-center justify-center">
            @if ($product->discount>0)
            <div class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded">
                  {{ $product->discount }}%
            </div>    
            @endif
            <div class="absolute top-1 right-1 rounded-full p-1">
                  @if (true)
                        <span class="material-symbols-outlined">
                              favorite
                        </span>
                  @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" width="28px" viewBox="0 -960 960 960"
                              fill="#ef4444">
                              <path
                                    d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Z" />
                        </svg>
                  @endif
            </div>
            <div>
                  <img src="{{asset('storage/images/keyboard.png');}}" class="max-w-60" alt="">
            </div>
      </div>
      <div class="mt-4 font-medium">
            <?php
            $price=$product->price;
            $discount=$product->discount;
            $rating = $product->reviews_avg_rating;
            $fullStars = floor($rating);
            $decimalPart = $rating - $fullStars;
            $showHalfStar = $decimalPart >= 0.5;
            ?>

            <h1>{{ $product->name }}</h1>
            <div class="flex gap-3">
                  <h1 class="font-medium text-red-500">{{ number_format($price - (($price * $discount) / 100), 2) }}$</h1>
                  <h1 class="line-through text-gray-500">{{ $price }}$</h1>
            </div>           

            <div class="flex">
                  @for ($i = 1; $i <= $fullStars; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"
                              fill="#FFD700">
                              <path
                                    d="m243-144 63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Z" />
                        </svg>
                  @endfor

                  @if ($showHalfStar)
                        <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"
                              fill="#FFD700">
                              <path
                                    d="m609-293-34-144 111-95-147-13-59-137v313l129 76ZM243-144l63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Z" />
                        </svg>
                  @endif

                  @for ($i = $fullStars + ($showHalfStar ? 1 : 0); $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"
                              fill="#FFD700">
                              <path
                                    d="m352-293 128-76 129 76-34-144 111-95-147-13-59-137-59 137-147 13 112 95-34 144ZM243-144l63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Zm237-333Z" />
                        </svg>
                  @endfor
            </div>
      </div>
</div>
