<main class="min-h-screen flex flex-col">
    @section('title')
        Cart
    @endsection
    <!-- Двухколоночный блок -->
    <div class="flex flex-1 md:flex-col relative mb-20">

        <!-- Левая колонка -->
        <div class="w-2/3 md:w-full md:order-2 overflow-y-auto md:h-auto px-6 pt-8 flex flex-col gap-16">

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
                <p class="text-xs text-red-400">Please allow 1-2 business days for processing before your order ships.<br>
                    Carrier delivery times may be impacted by increased holiday shipping volume, which could result in delays.</p>
            </section>

            <!-- Payment -->
            <section>
                <h2 class="text-5xl mb-4">Payment</h2>
                <p class="text-sm mb-4">All transactions are secure and encrypted.</p>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Credit card</label>
                    <div class="flex items-center justify-between border border-gray-300 rounded p-3 mb-2">
                        <span>Visa, MasterCard, etc.</span>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" class="h-5">
                    </div>
                    <x-ui.input-text name="card_number" placeholder="Card number" class="mb-2"/>
                    <div class="grid grid-cols-2 gap-4 mb-2">
                        <x-ui.input-text name="exp_date" placeholder="Expiration date (MM/YY)"/>
                        <x-ui.input-text name="security_code" placeholder="Security code"/>
                    </div>
                    <x-ui.input-text name="card_name" placeholder="Name on card" class="mb-2"/>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="accent-black">
                        <span>Use shipping address as billing address</span>
                    </label>
                </div>
            </section>

            <!-- Remember me -->
            <section>
                <h2 class="text-5xl mb-4">Remember me</h2>
                <label class="flex items-center space-x-2 mb-2">
                    <input type="checkbox" class="accent-black">
                    <span>Save my information for a faster checkout with a Shop account</span>
                </label>
                <x-ui.input-text name="mobile_phone" placeholder="Mobile phone number" class="mb-4"/>
                <x-ui.link>PLACE ORDER</x-ui.link>
                <p class="text-sm text-gray-600 mt-4">
                    Your info will be saved to a Shop account. By continuing, you agree to Shop's Terms of Service and acknowledge the Privacy Policy.
                </p>
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
                isEnabled: false,
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
            <div class="flex justify-between content hidden md:block" >
                <div class="flex gap-2" @click="isOpen = !isOpen" >
                    <span class="text-2xl">Order summary</span>
                    <x-heroicon-c-chevron-down class="w-4"/>
                </div>
            </div>
            <div x-show="!isEnabled || isOpen" class="sticky md:relative top-0 md:h-auto dark:bg-red-700 h-[calc(100vh-135px)] flex flex-col bg-red-50 pt-6md:pt-0 px-4 pb-8 overflow-y-auto"            >
                <div class="flex flex-col mb-8">
                    @foreach($cart_products as $product)
                        <div class="flex gap-4 border-b border-b-red-100 pb-4 pt-4 last:pb-0 last:border-0">
                            <div class="w-32 aspect-square relative">
                                <img src="{{$product->getFirstMediaUrl('examples')}}" class="w-32 aspect-square" alt="">
                                <span class="bg-red-300 w-6 h-6 flex items-center justify-center rounded-full absolute -top-2 -right-2 text-bright-200 aspect-square">{{$product['count']}}</span>
                            </div>

                            <div class="flex flex-col text-base">
                                <h3 class="font-bold text-lg">{{$product['name']}}</h3>
                                <p class="text-base">COLOR: JASPER</p>
                                <p class="text-base">SIZE: 38</p>
                            </div>
                            <p class="ml-auto mt-auto" x-text="formatPrice({{$product['price']}})"></p>
                        </div>
                    @endforeach
                </div>
                <div class="flex gap-4">
                    <x-ui.input-text name="promocode" class="bg-red-50" placeholder="Discount code"/>
                    <x-ui.link class="w-fit max-w-fit">APPLY</x-ui.link>
                </div>
                <div class="mt-auto flex flex-col gap-4">
                    <div class="flex justify-between">
                        <p>SUBTOTAL:</p>
                        <p x-text="formatPrice({{$cart_products->sum('price')}})"></p>
                    </div>
                    <div class="flex justify-between">
                        <p>SHIPPING:</p>
                        <p>5</p>
                    </div>
                    <div class="w-full h-px bg-red-100"></div>
                    <div class="flex justify-between font-bold mb-8">
                        <p>TOTAL:</p>
                        <p x-text="formatPrice({{$cart_products->sum('price') + 5}})"></p>
                    </div>
                    <p class="text-red-300 text-sm">The total amount you pay includes all applicable customs duties & taxes. We guarantee no additional charges on delivery.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Recently Viewed: на всю ширину -->
    <section class="w-full px-6 mt-12">
        <h2 class="mb-8">Complete the Look</h2>
        <x-three-cards id="complete" :products="$recent_products"/>
    </section>

</main>
