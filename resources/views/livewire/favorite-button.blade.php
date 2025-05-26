<div x-data="{ loading: false }" wire:click="toggleFavorite" @click.stop="loading = true" @wire:loading.remove
      @wire:target="toggleFavorite" wire:loading.attr="disabled">
      @if (!$isFavorite)
            <x-heroicon-o-heart class="h-{{ $size }} w-{{ $size }}"/>
      @else
            <x-heroicon-s-heart class="fill-red-500 h-{{ $size }} w-{{ $size }} border-0"/>
      @endif
</div>
