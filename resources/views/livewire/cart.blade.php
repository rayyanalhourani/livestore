<div>
      <div class="my-6">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('cart') }}
      </div>
      <div>
            <table class="w-full border-separate border-spacing-y-8 text-left">
                  <thead class="h-16 shadow">
                        <tr>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Subtotal</th>
                              <th>Delete</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($this->items as $item)
                              @php
                                    $discount = $item->product->discount;
                                    $price = $item->product->price;
                              @endphp
                              <tr class="h-24 shadow">
                                    <td>
                                          <div class="flex items-center gap-5 ml-10">
                                                <img src="{{ asset('storage/images/keyboard.png') }}" class="w-14"
                                                      alt="">
                                                <span>{{ $item->product->name }}</span>
                                          </div>
                                    </td>
                                    <td>
                                          <x-price :discount="$discount" :price="$price" />
                                    </td>
                                    <td>
                                          {{ $item->quantity }}
                                    </td>
                                    <td>
                                          {{ number_format($price - ($price * $discount) / 100, 2) * $item->quantity }}
                                    </td>
                                    <td>
                                          <button>
                                                <span class="material-symbols-outlined text-md">
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
