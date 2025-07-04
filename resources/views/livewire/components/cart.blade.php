<x-sidebar name="cart" class="flex flex-col" from="right">
    <h2 class="text-5xl mb-10">Cart ({{count($products)}})</h2>
    <div class="flex flex-1 flex-col gap-4">
        <div class="flex flex-col">
            @foreach($products as $product)
                <div class="flex gap-4 border border-b-red-100 pb-4 pt-4 last:pb-0 last:border-0">
                    <img src="{{$product->getFirstMediaUrl('examples')}}" class="w-32 aspect-square" alt="">
                    <div class="flex flex-col  text-base">
                        <h3 class="font-bold text-lg">{{$product['name']}}</h3>
                        <p class="text-base">COLOR: JASPER</p>
                        <p class="text-base">SIZE: 38</p>
                    </div>
                    <p class="ml-auto mt-auto" x-text="formatPrice({{$product['price']}})"></p>
                </div>
            @endforeach
        </div>
        <div class="mt-auto flex flex-col gap-4">
            <div class="flex justify-between">
                <p>SUBTOTAL:</p>
                <p x-text="formatPrice({{$products->sum('price')}})"></p>
            </div>
            @Auth
                <x-ui.link href="{{route('portal.cart')}}" wire:navigate>CHECKOUT</x-ui.link>
            @else
                <x-ui.link onclick="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'auth-modal' }))">CHECKOUT</x-ui.link>
            @endauth


        </div>
    </div>
</x-sidebar>
