@props([
    'rating' => 0,
    'numberOfReviews' => 0,
    'typeReviews' => false,
    'typeCount' => true,
    'size'=>18
])

<div class="flex items-center">
      @php
            $fullStars = floor($rating);
            $showHalfStar = $rating - $fullStars >= 0.5;
      @endphp

      @for ($i = 0; $i < $fullStars; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" height="{{$size}}px" width="{{$size}}px" fill="#FFD700" viewBox="0 -960 960 960">
                  <path d="m243-144 63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Z" />
            </svg>
      @endfor

      @if ($showHalfStar)
            <svg xmlns="http://www.w3.org/2000/svg" height="{{$size}}px" width="{{$size}}px" fill="#FFD700" viewBox="0 -960 960 960">
                  <path
                        d="m609-293-34-144 111-95-147-13-59-137v313l129 76ZM243-144l63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Z" />
            </svg>
      @endif

      @for ($i = $fullStars + ($showHalfStar ? 1 : 0); $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" height="{{$size}}px" width="{{$size}}px" fill="#FFD700"
                  viewBox="0 -960 960 960">
                  <path
                        d="m352-293 128-76 129 76-34-144 111-95-147-13-59-137-59 137-147 13 112 95-34 144ZM243-144l63-266L96-589l276-24 108-251 108 252 276 23-210 179 63 266-237-141-237 141Zm237-333Z" />
            </svg>
      @endfor

      @if ($typeCount)
            <div class="ml-1">
                  <span
                        class="text-sm text-black/50">({{ (int) $numberOfReviews }}{{ $typeReviews ? ' Reviews' : '' }})</span>
            </div>
      @endif
</div>
