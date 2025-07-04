@props([
    'product' => '',
])

<a wire:navigate href="{{route('portal.product', $product['slug'])}}" class="flex flex-col flex-1">
    <div class="aspect-square relative flex-1 mb-2">
        <img src="{{$product->getMedia('examples')->get(0)->getUrl()}}" class="absolute h-full w-full z-10 object-cover"
             alt="">
        <img src="{{$product->getMedia('examples')->get(1)->getUrl()}}" class="absolute h-full w-full z-20 object-cover hover:opacity-0 transition"
             alt="">
    </div>
    <div class="flex justify-between">
        <p class="">{{$product['name']}}</p>
        <p x-text="formatPrice({{$product['price']}})"></p>
    </div>

    <p>{{$product->brand['name']}}</p>
</a>
