<nav class="py-6 shadow">
      <div class="flex items-center justify-center">
            <h1 class="font-bold text-2xl font-inter">LIVESTORE</h1>

            <div class="flex mx-10 gap-6">
                  <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" wire:navigate>
                        Home
                  </x-nav-link>
                  <x-nav-link href="{{ route('categories') }}" :active="request()->routeIs('categories')" wire:navigate>
                        Categories
                  </x-nav-link>
                  <x-nav-link href="{{ route('new-arrival') }}" :active="request()->routeIs('new-arrival')" wire:navigate>
                        New arrival
                  </x-nav-link>
                  <x-nav-link href="{{ route('about-us') }}" :active="request()->routeIs('about-us')" wire:navigate>
                        About us
                  </x-nav-link>
            </div>

            <div>
                  <form action="" method="GET"
                        class="flex items-center justify-center border rounded-full px-3 py-1 w-96 bg-gray-200">
                        <input type="text" name="query" placeholder="Search..."
                              class="border-0 flex-grow px-2 py-1 text-gray-800 outline-none focus:ring-0 focus:border-transparent bg-gray-200">
                        <button type="submit" class="text-gray-500">
                              <span class="material-symbols-outlined text-2xl ">
                                    search
                              </span>
                        </button>
                  </form>
            </div>
            <div class="flex ml-10 gap-3">
                  <a href="{{ route('cart') }}" wire:navigate>
                        <span class="material-symbols-outlined text-3xl">
                              shopping_cart
                        </span>
                  </a>
                  <a href="{{ route('profile') }}" wire:navigate>
                        <span class="material-symbols-outlined text-3xl">
                              account_circle
                        </span>
                  </a>
                  <a href="{{ route('wishlist') }}" wire:navigate>
                        <span class="material-symbols-outlined text-3xl">
                              favorite
                        </span>
                  </a>
            </div>
      </div>
</nav>
