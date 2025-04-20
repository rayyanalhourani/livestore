@props(['category'])

<a
      class="w-40 h-36 border border-black/50 gap-4 flex flex-col items-center justify-center hover:text-white hover:bg-red-500 hover:cursor-pointer"
      href="{{route("category",$category->slug)}}">
      <span class="material-symbols-outlined text-5xl">
            phone_iphone
      </span>
      <span class="font-Satoshi">
            {{ $category->name }}
      </span>
</a>
