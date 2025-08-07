<x-sidebar name="cart" class="flex flex-col" from="right">
    <h2 class="text-5xl mb-10">Cart @if(count($products) > 0)
            ({{count($products)}})
        @endif</h2>
    <div class="flex flex-1 flex-col gap-4">
        <div class="flex flex-col">
            @foreach($products as $product)
                <div class="flex gap-4 border-b border-b-red-100 pb-4 pt-4 last:pb-0 last:border-0">
                    <img src="{{$product->getFirstMediaUrl('examples')}}" class="w-32 aspect-square" alt="">
                    <div class="flex flex-col  text-base">
                        <h3 class="font-bold text-lg">{{$product['name']}}</h3>
                        <p class="text-base">COLOR: JASPER</p>
                        <p class="text-base">SIZE: 38</p>
                        <div class="flex items-center mt-auto gap-2">
                            <button
                                class="text-2xl flex items-center justify-center text-red-700 bg-red-100 w-6 h-6 rounded-full hover:bg-red-300 hover:!text-bright-200 transition"
                                wire:click="decrement({{$product['id']}})"
                            >-
                            </button>
                            <span wire:loading.remove class="text-xl dark:text-bright-200 font-medium text-gray-900 mx-2">
                                {{$product['count']}}
                            </span>
                            <x-ui.spinner class="w-6 h-6"/>


                            <button
                                class="text-2xl flex items-center justify-center text-red-700 bg-red-100 w-6 h-6 rounded-full hover:bg-red-300 hover:!text-bright-200 transition"
                                wire:click="increment({{$product['id']}})"
                            >+
                            </button>
                        </div>
                    </div>
                    <p class="ml-auto mt-auto" wire:loading.remove
                       x-text="formatPrice({{$product['count_price']}})"></p>
                    <x-ui.spinner class="ml-auto mt-auto w-6 h-6"/>
                </div>
            @endforeach
        </div>
        @if(count($products) == 0)
            <p class="mb-8">No products in cart</p>
            <x-ui.link href="{{route('portal.shop')}}" wire:navigate>Shop now</x-ui.link>
        @endif

        @if(count($products) > 0)
            <div class="mt-auto flex flex-col gap-4">
                <div class="flex justify-between">
                    <p>SUBTOTAL:</p>
                    <p wire:loading.remove x-text="formatPrice({{$products->sum('count_price')}})"></p>
                    <x-ui.spinner class="w-6 h-6"/>
                </div>
                @Auth
                    <x-ui.link href="{{route('portal.cart')}}" wire:navigate>CHECKOUT</x-ui.link>
                @else
                    <x-ui.link onclick="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'auth-modal' }))">
                        CHECKOUT
                    </x-ui.link>
                @endauth
            </div>
        @endif
    </div>
</x-sidebar>
