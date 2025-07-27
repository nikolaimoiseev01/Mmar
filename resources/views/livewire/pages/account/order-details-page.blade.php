<main class="flex-1">
    @section('title')
        Account
    @endsection
    <div class="container mx-auto flex md:flex-col max-w-7xl px-6 sm:px-0 py-10 gap-8"
         x-data="tocHandler">

        <!-- Table of Contents -->
        <aside class="w-1/3 md:w-full">
            <div class="sticky top-20 p-4">
                <nav class="flex flex-col md:flex-row flex-wrap gap-2">
                    @foreach($contents as $content)
                        <a  href="{{route('account.welcome')}}#{{$content['id']}}"
                           :class="active === '{{$content['id']}}' ? 'bg-red-300 text-bright-200' : 'text-red-300'"
                           class="w-fit min-w-max rounded-3xl py-2 px-4 border border-red-300 transition hover:bg-red-300 hover:text-bright-200">
                            {{$content['title']}}
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <!-- Main Article -->
        <div class="content mt-4 sm:mt-0 flex flex-col gap-16">
            <!-- Shipping Addresses -->
            <section id="shipping_addresses" class="space-y-14 sm:space-y-4">
                <div class="flex justify-between items-center mb-10 sm:mb-0">
                    <a href="{{route('account.welcome')}}" wire:navigate class="text-sm font-bold  hover:text-black">&lt;
                        Back</a>
                </div>

                <div class="flex justify-between items-end gap-4 flex-wrap">
                    <div class="flex gap-8 items-center flex-wrap sm:gap-4">
                        <h1 class="text-5xl mb-1 whitespace-nowrap">Order №56 </h1>
                        <span class="bg-red-300 rounded-full w-2 h-2 block "></span>
                        <h1 class="text-5xl text-red-300">Processing</h1>
                    </div>
                    <span class="text-sm ">12.01.2025</span>
                </div>

                <!-- Items Purchased -->
                <div class="mt-8">
                    <h3 class="text-sm uppercase tracking-wide text-red-300 mb-4">Items Purchased</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-6">

                        <!-- Item 1 -->
                        <div class="flex items-start gap-4  p-4 rounded-lg">
                            <div class="relative">
                                <img src="/fixed/test/product-1.png" alt="JILL MID, PREV"
                                     class="w-40 h-40 object-cover rounded"/>
                                <span
                                    class="absolute top-0 left-0  text-white text-xs px-2 py-0.5 rounded-full">1</span>
                            </div>
                            <div class="flex flex-col h-40">
                                <p class="font-semibold mb-8">JILL MID, PREV</p>
                                <p class="text-sm ">SIZE: 38 &nbsp; COLOR: Jasper</p>
                                <p class="mt-2 font-medium mt-auto">€190,00</p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="flex items-start gap-4  p-4 rounded-lg">
                            <div class="relative">
                                <img src="/fixed/test/product-2.png" alt="JILL MID, PREV"
                                     class="w-40 h-40 object-cover rounded"/>
                                <span
                                    class="absolute top-0 left-0  text-white text-xs px-2 py-0.5 rounded-full">1</span>
                            </div>
                            <div class="flex flex-col h-40">
                                <p class="font-semibold mb-8">JILL MID, PREV</p>
                                <p class="text-sm ">SIZE: 38 &nbsp; COLOR: Jasper</p>
                                <p class="mt-2 font-medium mt-auto">€190,00</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Order Summary -->
                <div class="mt-10 border-t border-gray-200 pt-6">
                    <h3 class="text-sm  uppercase tracking-wide mb-4">Order Summary</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span>SUBTOTAL</span>
                            <span>€244,00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>SHIPING</span>
                            <span>€5</span>
                        </div>
                        <div class="flex justify-between font-semibold text-lg border-t pt-2 mt-2">
                            <span>Total</span>
                            <span>€249,00</span>
                        </div>
                    </div>
                </div>

                <!-- Shipping and Payment Info -->
                <div class="grid grid-cols-2 md:grid-cols-1 gap-y-12 gap-6 mt-10 text-sm ">
                    <div>
                        <p class="text-red-300 mb-4">Shipping Address</p>
                        <p>Via del Conservatorio, 63, 00186 Roma RM, Italy</p>
                    </div>
                    <div>
                        <p class="text-red-300 mb-4">Shipping Method</p>
                        <p>Express Courier (Air)</p>
                    </div>
                    <div>
                        <p class="text-red-300 mb-4">Delivery Date</p>
                        <p>16.01.2025</p>
                    </div>
                    <div>
                        <p class="text-red-300 mb-4">Payment Method</p>
                        <p>Visa **56</p>
                    </div>
                </div>

                <!-- Repeat Order Button -->
                <x-ui.link>
                    REPEAT ORDER
                </x-ui.link>
            </section>

        </div>
    </div>
</main>
