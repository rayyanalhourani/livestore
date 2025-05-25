@props(['category'])

<a class="min-w-40 h-36 border border-black/50 rounded gap-4 flex flex-col items-center justify-center hover:text-white hover:bg-red-500 hover:cursor-pointer"
      href="{{ route('category', $category->slug) }}">
      @if (isset($category->icon))
      <x-dynamic-component :component="$category->icon" class="h-12 w-12 text-gray-300" />
      @else
            <x-heroicon-m-tag class="h-12 w-12 text-gray-300" />
      @endif
      <span class="font-Satoshi text-center truncate max-w-[140px] w-full px-2">
            {{ $category->name }}
        </span>
</a>
