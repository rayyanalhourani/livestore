<x-layouts.app>
      <div class="flex items-center">
            <img src="{{ asset('images/image1.png') }}" class="min-h-[calc(100vh-90px)]">
            <div class="flex flex-col items-center justify-center w-full">
                  <div>
                        <x-validation-errors class="mb-4" />

                        <div class="flex flex-col gap-6 mb-12">
                              <span class="text-4xl font-medium">Log in to Exclusive</span>
                              <span>Enter your details below</span>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="w-96 flex flex-col gap-10">
                              @csrf

                              <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username"
                                    placeholder="Email or Phone Number" />

                              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                    autocomplete="current-password" placeholder="Password" />

                              {{-- <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                          <x-checkbox id="remember_me" name="remember" />
                                          <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                              </div> --}}

                              <div class="flex items-center justify-between">
                                    <x-button class="ms-4">
                                          {{ __('Log in') }}
                                    </x-button>

                                    <a class="text-red-500 hover:text-gray-600 focus:underlined"
                                          href="{{ route('password.request') }}">
                                          {{ __('Forgot password?') }}
                                    </a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</x-layouts.app>
