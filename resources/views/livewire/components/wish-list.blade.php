<x-sidebar name="wishlist" class="flex flex-col" from="right">
    <h2 class="text-5xl mb-10">Wishlist ({{count($products)}})</h2>
    <div class="flex flex-1 flex-col gap-4">
        <div class="flex flex-col">
            @if(count($products) > 0)
            @foreach($products as $product)
                <a href="{{route('portal.product', $product->slug)}}" class="flex gap-4 border-b border-b-red-100 pb-4 pt-4 last:pb-0 last:border-0">
                    <img src="{{$product->getFirstMediaUrl('examples')}}" class="w-32 aspect-square" alt="">
                    <div class="flex flex-col  text-base">
                        <h3 class="font-bold text-lg">{{$product['name']}}</h3>
                        <p class="text-base">COLOR: JASPER</p>
                        <p class="text-base">SIZE: 38</p>
                    </div>
                    <p class="ml-auto mt-auto" x-text="formatPrice({{$product['price']}})"></p>
                </a>
            @endforeach
            @else
                <p class="mb-8">No products in wishlist</p>
                <x-ui.link href="{{route('portal.shop')}}" wire:navigate>Shop now</x-ui.link>
            @endif
        </div>
    </div>
</x-sidebar>
