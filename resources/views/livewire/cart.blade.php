<div>
      <div class="my-6">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('cart') }}
      </div>
      <div>
            <table class="w-full table-auto border-separate border-spacing-y-4 text-left">
                  <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <tr>
                              <th class="px-6 py-3">Product</th>
                              <th class="px-6 py-3">Price</th>
                              <th class="px-6 py-3">Quantity</th>
                              <th class="px-6 py-3">Subtotal</th>
                              <th class="px-6 py-3">Delete</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($this->items as $item)
                              @php
                                    $discount = $item->product->discount;
                                    $price = $item->product->price;
                                    $subtotal = number_format(
                                        ($price - ($price * $discount) / 100) * $item->quantity,
                                        2,
                                    );
                              @endphp
                              <tr class="bg-white shadow rounded-lg h-24 hover:bg-gray-50 transition-all duration-150">
                                    <td class="px-6 py-4">
                                          <div class="flex items-center gap-4">
                                                <img src="{{ asset('storage/images/keyboard.png') }}"
                                                      class="w-14 h-14 object-cover rounded" alt="">
                                                <span
                                                      class="font-medium text-gray-800">{{ $item->product->name }}</span>
                                          </div>
                                    </td>
                                    <td class="px-6 py-4">
                                          <x-price :discount="$discount" :price="$price" />
                                    </td>
                                    <td class="px-6 py-4">
                                          {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                          ${{ $subtotal }}
                                    </td>
                                    <td class="px-6 py-4">
                                          <button
                                                class="flex items-center justify-center p-2 rounded-full hover:bg-red-100 transition"
                                                wire:click="deleteProductFromCart({{ $item->product->id }})">
                                                <span class="material-symbols-outlined text-red-500">
                                                      delete
                                                </span>
                                          </button>
                                    </td>
                              </tr>
                        @endforeach
                  </tbody>
            </table>
            <div class="flex justify-between">
                  <button class="w-56 h-14 border rounded border-black/50">
                        Return to Shop
                  </button>
                  <button class="w-56 h-14 border rounded border-black/50">
                        Update Cart
                  </button>
            </div>
            <div class="my-20 flex items-start justify-between">
                  <form class="flex gap-4 h-14">
                        <input type="text" placeholder="Coupon Code" class="w-72" />
                        <button class="w-52 bg-red-500 text-white font-medium flex items-center justify-center rounded">
                              Apply Coupon
                        </button>
                  </form>
                  <div class="h-84 border-2 border-black rounded px-6 py-8">
                        <span class="text-xl font-medium">Cart total</span>
                        <div class="font-Poppins text-lg border-b-2 w-80 py-4 flex items-center justify-between">
                              <span>Subtotal:</span>
                              <span>$1470</span>
                        </div>
                        <div class="font-Poppins text-lg border-b-2 w-80 py-4 flex items-center justify-between">
                              <span>Shipping:</span>
                              <span>Free</span>
                        </div>
                        <div class="font-Poppins text-lg w-80 py-4 flex items-center justify-between">
                              <span>Total:</span>
                              <span>$1470</span>
                        </div>
                        <div class="flex items-center justify-center">
                              <button class="h-14 w-64 text-white font-Poppins bg-red-500 rounded font-medium">
                                    Process to checkout
                              </button>
                        </div>
                  </div>
            </div>
      </div>
</div>
