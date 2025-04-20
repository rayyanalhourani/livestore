@props(['title', 'header'])

<div>
      <div class="flex items-center gap-3">
            <div class="w-5 h-10 rounded-md bg-red-500"></div>
            <h1 class="text-red-500 font-semibold">{{ $title }}</h1>

      </div>
      @if (isset($header))
            <h1 class="my-6 text-4xl">{{ $header }}</h1>
      @endif
</div>
