@props([
    'product' => '',
    'shopMode' => false
])

<a wire:navigate
   href="{{route('portal.product', $product['slug'])}}" {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <div class="aspect-square relative flex-1 mb-2 image-item group">
        @if($shopMode)
            <div class="flex flex-col gap-2 absolute  top-3 left-3">
                @foreach($product['label'] as $label)
                    <span
                        class="py-1 px-4 bg-blue-300 w-fit rounded-2xl flex justify-center z-30 items-center">{{$label}}</span>
                @endforeach
            </div>
            <div class="absolute opacity-0 group-hover:opacity-100 transition bottom-3 right-3 flex gap-4 z-30">
                <div class="bg-blue-300 p-4 rounded-full flex justify-center items-center aspect-square group/svg">
                    <svg class="w-7 h-5" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="stroke-red-700 dark:stroke-bright-200 group-hover/svg:fill-red-700 transition"
                              d="M4.4541 4.73535H12.4854C13.1975 4.73538 13.8119 5.23603 13.9551 5.93359L15.958 15.6982C16.1488 16.6285 15.4379 17.5 14.4883 17.5H2.45117C1.50159 17.5 0.790632 16.6285 0.981445 15.6982L2.98438 5.93359C3.12761 5.23603 3.74196 4.73535 4.4541 4.73535Z"
                              stroke="#240309"/>
                        <path class="stroke-red-700 dark:stroke-bright-200"
                              d="M9.85083 0.0107422C10.8592 0.113268 11.6458 0.964545 11.6458 2V8.4707H10.6458V2C10.6458 1.44772 10.198 1 9.64575 1H7.29321C6.74093 1 6.29321 1.44771 6.29321 2V8.4707H5.29321V2C5.29321 0.96435 6.08044 0.113005 7.08911 0.0107422L7.29321 0H9.64575L9.85083 0.0107422Z"
                              fill="#240309"/>
                    </svg>
                </div>
                <div class="bg-blue-300 p-4 rounded-full flex justify-center items-center group/svg">
                    <svg class="w-7 h-5" width="17" height="20" viewBox="0 0 17 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 3.04685V17.9746C1 18.8854 2.00969 19.3429 2.60031 18.6981L8.5 12.2577L14.3997 18.6981C14.9903 19.3429 16 18.8864 16 17.9746V3.04685C16 2.504 15.8025 1.98337 15.4508 1.59951C15.0992 1.21565 14.6223 1 14.125 1H2.875C2.37772 1 1.90081 1.21565 1.54917 1.59951C1.19754 1.98337 1 2.504 1 3.04685Z"
                            class="stroke-red-700 dark:stroke-bright-200 group-hover/svg:fill-red-700 transition"
                            stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        @endif
        <img src="{{$product->getMedia('examples')->get(0)->getUrl()}}" class="absolute h-full w-full z-10 object-cover"
             alt="">
        <img src="{{$product->getMedia('examples')->get(1)->getUrl()}}"
             class="absolute h-full w-full z-20 object-cover group-hover:opacity-0 transition"
             alt="">
    </div>
    <div class="flex justify-between">
        <p class="">{{$product['name']}}</p>
        <p x-text="formatPrice({{$product['price']}})"></p>
    </div>
    <p>{{$product->brand['name']}}</p>
</a>
