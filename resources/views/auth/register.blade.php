<x-layouts.app>
      <div class="flex items-center">
            <img src="{{ asset('images/image1.png') }}" class="min-h-[calc(100vh-90px)]">
            <div class="flex flex-col items-center justify-center w-full">
                  <div>
                        <x-validation-errors class="mb-4" />

                        <div class="flex flex-col gap-6 mb-12">
                              <span class="text-4xl font-medium">Create an account</span>
                              <span>Enter your details below</span>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="w-96 flex flex-col gap-10">
                              @csrf

                              <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>

                              <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" placeholder="Email or Phone Number"/>

                              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                    autocomplete="new-password" placeholder="Password" />

                              <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>



                              <div class="flex items-center justify-between">
                                    <x-button class="ms-4">
                                          {{ __('Register') }}
                                    </x-button>

                                    <a class="text-red-500 hover:text-gray-600 focus:underlined"
                                          href="{{ route('login') }}">
                                          {{ __('Already registered?') }}
                                    </a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</x-layouts.app>
