@props([
    'product' => '',
    'shopMode' => false
])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <div class="aspect-square relative flex-1 mb-2 image-item group">
        @if($shopMode)
            <div class="flex flex-col gap-2 absolute  top-3 left-3 sm:gap-1">
                @if($product['label'] ?? null)
                    @foreach($product['label'] as $label)
                        <span
                            class="py-1 px-4 bg-blue-300 dark:bg-red-700 dark:text-bright-200 w-fit rounded-2xl flex justify-center z-30 items-center sm:text-xs">{{$label}}</span>
                    @endforeach
                @endif
            </div>
            <div
                class="absolute opacity-0 group-hover:opacity-100 transition bottom-3 right-3 sm:hidden flex gap-4 z-30">
                <div onclick="event.stopPropagation(); event.preventDefault();
                window.Livewire.dispatch('addIdToCookie', { id: {{$product['id']}}, count: 1, price: {{$product['price']}} })"
                     class="basket-wishlist-button cursor-pointer bg-blue-300 dark:bg-red-700 dark:text-bright-200 p-4 rounded-full flex justify-center items-center aspect-square group/svg">
                    <svg id="product-basket-button-{{$product['id']}}" class="w-7 h-5" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.45508 4.73532H12.4863C13.1985 4.73535 13.8128 5.236 13.9561 5.93356L15.959 15.6982C16.1498 16.6284 15.4388 17.5 14.4893 17.5H2.45215C1.50256 17.5 0.791608 16.6284 0.982422 15.6982L2.98535 5.93356C3.12859 5.236 3.74294 4.73532 4.45508 4.73532Z" class="stroke-red-700 dark:stroke-bright-200 group-hover/svg:fill-red-700 transition"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.29419 1H9.64713C10.1994 1 10.6471 1.44772 10.6471 2V8.47054H11.6471V2C11.6471 0.895431 10.7517 0 9.64713 0H7.29419C6.18962 0 5.29419 0.895432 5.29419 2V8.47054H6.29419V2C6.29419 1.44772 6.74191 1 7.29419 1ZM7.28023 16.9411C7.28488 16.9412 7.28954 16.9412 7.29419 16.9412H9.64713C9.65179 16.9412 9.65644 16.9412 9.66109 16.9411H7.28023Z" class="fill-red-700 dark:fill-bright-200 group-hover/svg:fill-red-700 transition"/>
                    </svg>
                </div>
                <div
                    onclick="event.stopPropagation(); event.preventDefault();
                window.Livewire.dispatch('addIdToWishlist', { id: {{$product['id']}}, price: {{$product['price']}} })"
                    class="basket-wishlist-button cursor-pointer bg-blue-300 dark:bg-red-700 dark:text-bright-200 p-4 rounded-full flex justify-center items-center group/svg">
                    <svg id="product-wishlist-button-{{$product['id']}}" class="wishlist-button w-7 h-5" width="17" height="20" viewBox="0 0 17 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 3.04685V17.9746C1 18.8854 2.00969 19.3429 2.60031 18.6981L8.5 12.2577L14.3997 18.6981C14.9903 19.3429 16 18.8864 16 17.9746V3.04685C16 2.504 15.8025 1.98337 15.4508 1.59951C15.0992 1.21565 14.6223 1 14.125 1H2.875C2.37772 1 1.90081 1.21565 1.54917 1.59951C1.19754 1.98337 1 2.504 1 3.04685Z"
                            class="stroke-red-700 dark:stroke-bright-200 group-hover/svg:fill-red-700 transition"
                            stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        @endif
        <a href="{{route('portal.product', $product['slug'])}}" wire:navigate>
            <img src="{{$product->getMedia('examples')->get(0)->getUrl()}}"
                 class="absolute h-full w-full z-10 object-cover"
                 alt="">
            <img src="{{$product->getMedia('examples')->get(1)->getUrl()}}"
                 class="absolute h-full w-full z-20 object-cover group-hover:opacity-0 transition"
                 alt="">
        </a>
    </div>
    <a wire:navigate
       href="{{route('portal.product', $product['slug'])}}"
       class="flex flex-col"
    >
        <div class="flex justify-between">
            <p class="sm:uppercase">{{$product['name']}}</p>
            <p x-text="formatPrice({{$product['price']}})"></p>
        </div>
        <p>{{$product->brand['name']}}</p>
    </a>

</div>
