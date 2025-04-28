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
                  <a href="{{ route('wishlist') }}" wire:navigate>
                        <span class="material-symbols-outlined text-3xl">
                              favorite
                        </span>
                  </a>
                  <div class="relative inline-block text-left" x-data="{ open: false }">
                        <div>
                              <button @click="open = !open" type="button" class="flex justify-center items-center"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <span class="material-symbols-outlined text-3xl">
                                          account_circle
                                    </span>
                                    <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                          aria-hidden="true">
                                          <path fill-rule="evenodd"
                                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                    </svg>
                              </button>
                        </div>
                        <div x-show="open" @click.outside="open = false"
                              class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                              role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                              @if (Illuminate\Support\Facades\Auth::check())
                                    <div class="py-1" role="none">
                                          <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1">Manage my Account</a>
                                          <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1">My Orders</a>
                                          <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1">My Reviews</a>
                                          <form method="POST" action="{{route('logout')}}" role="none">
                                                @csrf
                                                <button type="submit"
                                                      class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                                      role="menuitem" tabindex="-1">Logout</button>
                                          </form>
                                    </div>
                              @else
                                    <div class="py-1" role="none">
                                          <a wire:navigate href="{{route('login')}}" class="block px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1">Login</a>
                                          <a wire:navigate href="{{route('register')}}" class="block px-4 py-2 text-sm text-gray-700"
                                                role="menuitem" tabindex="-1">Sign up</a>
                                    </div>
                              @endif
                        </div>
                  </div>
            </div>
      </div>
</nav>
