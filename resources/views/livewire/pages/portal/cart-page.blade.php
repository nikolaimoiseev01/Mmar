<main class="min-h-screen flex flex-col">
    @section('title')
        Cart
    @endsection
    <!-- Двухколоночный блок -->
    <div class="flex flex-1 md:flex-col relative mb-20">

        <!-- Левая колонка -->
        <div class="w-2/3 md:w-full md:order-2 md:h-auto px-6 pt-8 flex flex-col gap-16">

            <!-- Contact -->
            <section>
                <h2 class="text-5xl mb-4">Contact</h2>
                <x-ui.input-text type="email" name="email" placeholder="Email" class="mb-2"/>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="accent-black">
                    <span>Email me news and offers</span>
                </label>
            </section>

            <!-- Delivery -->
            <section>
                <h2 class="text-5xl mb-4">Delivery</h2>
                <select name="country" class="w-full border border-gray-300 bg-bright-200 rounded p-3 mb-4">
                    <option>Country/Region</option>
                    <option>Italy</option>
                </select>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <x-ui.input-text name="first_name" placeholder="First name"/>
                    <x-ui.input-text name="last_name" placeholder="Last name"/>
                </div>
                <x-ui.input-text name="address" placeholder="Address" class="mb-4"/>
                <x-ui.input-text name="apartment" placeholder="Apartment, suite, etc. (optional)" class="mb-4"/>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <x-ui.input-text name="postal_code" placeholder="Postal code"/>
                    <x-ui.input-text name="city" placeholder="City"/>
                </div>
                <x-ui.input-text name="phone" placeholder="Phone" class="mb-4"/>

                <h3 class="mb-2 mt-8">SHIPPING METHOD</h3>
                <div class="flex w-full p-4 flex-col gap-4 border border-gray-300 rounded-xl mb-4">
                    <div class="flex justify-between">
                        <p>Express Courier (Air)</p>
                        <p>€5</p>
                    </div>
                    <p class="text-red-300">4 business days</p>
                </div>
                <p class="text-xs text-red-400">Please allow 1-2 business days for processing before your order
                    ships.<br>
                    Carrier delivery times may be impacted by increased holiday shipping volume, which could result in
                    delays.</p>
            </section>

            <!-- Payment -->

            <section class="" x-data="{ showBilling: false }">
                <h2 class="text-5xl">Payment</h2>
                <p class="text-red-300 text-base mb-6">All transactions are secure and encrypted.</p>
                <div class="bg-red-50 dark:bg-red-500 rounded-xl pb-4">
                    <div
                        class="flex justify-between bg-bright-200 dark:bg-red-500 items-center mb-4 px-4 py-3 border border-red-700 rounded-t-xl">
                        <h2 class="text-lg font-semibold">Credit card</h2>

                        <div class="flex justify-end space-x-2">
                            <img src="/fixed/icon-visa.png" class="h-4" alt="Visa"/>
                            <img src="/fixed/icon-mc.png" class="h-4" alt="Mastercard"/>
                            <img src="/fixed/icon-union.png" class="h-4" alt="UnionPay"/>
                        </div>
                    </div>

                    <!-- Card Details -->
                    <div class="space-y-4 px-4">
                        <x-ui.input-text name="card_number" placeholder="Card number"/>
                        <div class="flex space-x-4">
                            <x-ui.input-text name="expiration_date" placeholder="Expiration date (MM/YY)"
                                             class="w-1/2"/>
                            <x-ui.input-text name="security_code" placeholder="Security code" class="w-1/2"/>
                        </div>
                        <x-ui.input-text name="name_on_card" placeholder="Name on card"/>
                    </div>

                    <!-- Use shipping address -->
                    <div class="mt-4 flex items-center space-x-2 px-4">
                        <input
                            type="checkbox"
                            id="use-shipping"
                            checked="true"
                            class="h-4 w-4"
                            @change="showBilling = !$event.target.checked"
                        />
                        <label for="use-shipping" class="text-sm text-gray-700">Use shipping address as billing
                            address</label>
                    </div>

                    <!-- Billing Address -->
                    <div class="mt-8 px-4" x-show="showBilling" x-transition>
                        <h3 class="mb-2 uppercase">Billing Address</h3>
                        <div class="space-y-4">
                            <select class="w-full border bg-transparent border-gray-300 rounded-md px-4 py-2">
                                <option selected>Italy</option>
                                <!-- Add more countries as needed -->
                            </select>
                            <div class="flex space-x-4">
                                <x-ui.input-text name="first_name" placeholder="First name" class="w-1/2"/>
                                <x-ui.input-text name="last_name" placeholder="Last name" class="w-1/2 "/>
                            </div>
                            <x-ui.input-text name="address" placeholder="Address"/>
                            <x-ui.input-text name="apartment" placeholder="Apartment, suite, etc. (optional)"/>
                            <div class="flex space-x-4">
                                <x-ui.input-text name="postal_code" placeholder="Postal code" class="w-1/2"/>
                                <x-ui.input-text name="city" placeholder="City" class="w-1/2"/>
                            </div>
                            <x-ui.input-text name="phone" placeholder="Phone (optional)"/>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Remember me -->
            <section class="">
                <h2 class="text-5xl mb-4">Remember me</h2>
                <div class="bg-red-50 dark:bg-red-500 rounded-xl">
                    <label
                        class="flex items-center space-x-2 mb-2 bg-bright-200 dark:bg-red-500 border border-red-700 rounded-t-xl p-4">
                        <input type="checkbox" class="accent-black">
                        <span>Save my information for a faster checkout with a Shop account</span>
                    </label>
                    <div class="p-4">
                        <x-ui.input-text name="mobile_phone" placeholder="Mobile phone number"/>
                    </div>

                </div>
                <div class="mt-8">
                    <x-ui.link>PLACE ORDER</x-ui.link>
                    <p class="text-sm text-gray-600 mt-4">
                        Your info will be saved to a Shop account. By continuing, you agree to Shop's Terms of Service
                        and
                        acknowledge the Privacy Policy.
                    </p>
                </div>

            </section>


            <!-- Footer links -->
            <div class="text-sm mt-4 space-x-4">
                <a href="#" class="underline">Refund Policy</a>
                <a href="#" class="underline">Shipping Policy</a>
                <a href="#" class="underline">Privacy Policy</a>
                <a href="#" class="underline">Terms of Service</a>
            </div>
        </div>

        <!-- Правая колонка: Cart -->
        <div class="w-1/3 relative md:w-full md:pt-6"
             x-data="{
                isEnabled: true,
                isOpen: false,
                init() {
                  // Включаем, если ширина >= 768px
                  this.isEnabled = window.innerWidth <= 768;

                  window.addEventListener('resize', () => {
                    this.isEnabled = window.innerWidth <= 768;
                  });
                }
              }"
        >
            <div class=" justify-between content hidden bg-red-50 py-4 md:flex">
                <div class="flex gap-2" @click="isOpen = !isOpen">
                    <span class="text-2xl">Order summary</span>
                    <div class="flex items-center" :class="isOpen ? 'rotate-180' : ''">
                        <x-heroicon-c-chevron-down class="w-6"/>
                    </div>
                </div>
                <p class="font-bold" x-text="formatPrice({{$cart_products->sum('count_price') + 5}})"></p>
            </div>
            <div x-show="!isEnabled || isOpen"
                 class="sticky md:relative top-0 md:h-auto dark:bg-red-500 h-[calc(100vh-135px)] flex flex-col bg-red-50 pt-6md:pt-0 px-4 pb-8 overflow-y-auto">
                <div class="flex flex-col mb-8">
                    @foreach($cart_products as $product)
                        <div class="flex gap-4 border-b border-b-red-100 pb-4 pt-4 last:pb-0 last:border-0">
                            <div class="w-32 aspect-square relative">
                                <img src="{{$product->getFirstMediaUrl('examples')}}" class="w-32 aspect-square" alt="">
                                <span
                                    class="bg-red-300 w-6 h-6 flex items-center justify-center rounded-full absolute -top-2 -right-2 text-bright-200 aspect-square">{{$product['count']}}</span>
                            </div>

                            <div class="flex flex-col text-base">
                                <h3 class="font-bold text-lg">{{$product['name']}}</h3>
                                <p class="text-base">COLOR: JASPER</p>
                                <p class="text-base">SIZE: 38</p>
                            </div>
                            <p class="ml-auto mt-auto" x-text="formatPrice({{$product['count_price']}})"></p>
                        </div>
                    @endforeach
                </div>
                <div class="flex gap-4 mb-16 sm:mb-8">
                    <x-ui.input-text name="promocode" class="bg-red-50" placeholder="Discount code"/>
                    <x-ui.link class="w-fit max-w-fit">APPLY</x-ui.link>
                </div>
                <div class="mt-auto flex flex-col gap-4">
                    <div class="flex justify-between">
                        <p>SUBTOTAL:</p>
                        <p x-text="formatPrice({{$cart_products->sum('count_price')}})"></p>
                    </div>
                    <div class="flex justify-between">
                        <p>SHIPPING:</p>
                        <p>5</p>
                    </div>
                    <div class="w-full h-px bg-red-100"></div>
                    <div class="flex justify-between font-bold mb-8">
                        <p>TOTAL:</p>
                        <p x-text="formatPrice({{$cart_products->sum('count_price') + 5}})"></p>
                    </div>
                    <p class="text-red-300 text-sm">The total amount you pay includes all applicable customs duties &
                        taxes. We guarantee no additional charges on delivery.</p>
                </div>
            </div>
        </div>

    </div>

</main>
