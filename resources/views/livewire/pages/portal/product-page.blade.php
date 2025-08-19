<main class="flex-1">
    @section('title')
        {{$product['slug']}}
    @endsection
    <x-modal-product-info name="product-info" :tabs="['details', 'materials', 'aftercare', 'manufacturing']">
    </x-modal-product-info>
    <section class="flex mb-52 md:flex-col" x-data="{ open: false }">
        <div class="fixed top-0 left-0 w-full h-full bg-bright-200 z-[60]" x-show="open"></div>
        <div class="bg-bright-300 w-1/2 md:w-full aspect-square relative"
             :class="open ? '!fixed h-full w-full min-w-[100vw] sm:!h-auto !z-[9999] aspect-square top-1/2 left-1/2 max-w-max !-translate-x-1/2 !-translate-y-1/2' : ''">

            <div class="absolute transition top-3 left-3 flex gap-4 z-40">
                <div
                    id="wishlist-button-{{$product['id']}}"
                    wire:ignore
                    wire:click="makeToWishlist({{$product['id']}})"
                    class="basket-wishlist-button bg-red-100 aspect-square  cursor-pointer w-12 h-12 p-2 rounded-full flex justify-center items-center group/svg">
                    <svg  id="product-wishlist-button-{{$product['id']}}" class="wishlist-button w-full" width="17" height="20"
                         viewBox="0 0 17 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 3.04685V17.9746C1 18.8854 2.00969 19.3429 2.60031 18.6981L8.5 12.2577L14.3997 18.6981C14.9903 19.3429 16 18.8864 16 17.9746V3.04685C16 2.504 15.8025 1.98337 15.4508 1.59951C15.0992 1.21565 14.6223 1 14.125 1H2.875C2.37772 1 1.90081 1.21565 1.54917 1.59951C1.19754 1.98337 1 2.504 1 3.04685Z"
                            class="stroke-bright-200 dark:stroke-bright-200 group-hover/svg:fill-red-700 transition"
                            stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div x-on:click="open = ! open"
                     class="basket-wishlist-button bg-red-100   p-2 w-12 h-12 cursor-pointer rounded-full flex justify-center items-center aspect-square group">
                    <x-clarity-resize-line x-show="!open"
                                           class="text-bright-200 w-6 group-hover:text-red-700 sm:group-hover:text-bright-200 transition"/>
                    <x-clarity-resize-down-line x-show="open"
                                                class="text-bright-200 w-6 group-hover:text-red-700 sm:group-hover:text-bright-200 transition"/>
                </div>
            </div>
            <style>
                @media only screen and (min-width: 768px) {
                    .product-examples-slider-opened {
                        aspect-ratio: 1/1;
                        height:100vh;
                        width: calc(100vh * 1/1);
                        &::before {
                            float: left;
                            padding-top: 100%;
                            content: "";
                        }

                        &::after {
                            display: block;
                            content: "";
                            clear: both;
                        }
                    }
                }
            </style>
            <div :class="open ? 'product-examples-slider-opened h-screen max-w-max mx-auto sm:h-auto' : ''">
                <x-product-examples-slider :examples="$product->getMedia('examples')"/>
            </div>
        </div>
        <div class="smooth-content  flex flex-col pt-20 pl-10 md:pl-6 pr-6 w-1/2 md:w-full md:pt-8">
            <div class="w-full flex justify-between items-end flex-wrap">
                <h1 class="text-5xl sm:text-4xl">{{$product['name']}}</h1>
                <h1 class="text-2xl" x-text="formatPrice({{$product['price']}})"></h1>
            </div>
            <p class="text-xl mb-12">{{$product->brand['name']}}</p>
            <div class="flex flex-col gap-2 mb-9">
                <p>COLOR: JASPER</p>
                <div class="flex gap-2">
                    <span class="w-8 h-8 rounded-full bg-green-500"></span>
                    <span class="w-8 rounded-full bg-red-500"></span>
                    <span class="w-8 rounded-full bg-blue-500"></span>
                </div>
            </div>
            <div class="flex flex-col gap-2 mb-10">
                <div class="flex justify-between">
                    <p>SIZE:</p>
                    <x-ui.link-arrow
                        href="{{route('portal.size-guide')}}"
                        text="Size Guide"
                        textSize="text-base"
                        class="font-bold"
                        iconSize="h-4 w-4"
                    />
                </div>

                <div class="flex gap-2 text-base">
                    <span
                        class="p-4 rounded bg-red-700 dark:bg-red-300 dark:text-red-700 cursor-pointer text-bright-200 flex items-center justify-center">10</span>
                    <span
                        class="p-4 rounded bg-red-100 dark:bg-bright-200 dark:text-red-700 cursor-pointer flex items-center justify-center">11</span>
                    <span
                        class="p-4 rounded bg-red-100 dark:bg-bright-200 dark:text-red-700 cursor-pointer flex items-center justify-center">11</span>
                </div>
            </div>
            <div class="flex flex-col mb-14">
                <p>MATERIALS:</p>
                <p>Apple Leather, Rubber, Tea Leather</p>
            </div>

            <div class="flex gap-4">
                <div class="flex items-center justify-center w-40 h-12 bg-gray-100 rounded-md border border-gray-300">
                    <button
                        class="text-2xl text-gray-500 hover:text-black px-4"
                        wire:click="decrement"
                    >-
                    </button>

                    <span class="text-xl font-medium text-gray-900 mx-2">
                        {{ $count }}
                    </span>

                    <button
                        class="text-2xl text-gray-500 hover:text-black px-4"
                        wire:click="increment"
                    >+
                    </button>
                </div>

                <x-ui.link
                    id="big-basket-button-{{$product['id']}}"
                    wire:ignore
                    wire:click="makeToCookie({{$product['id']}})"
                    class="mb-8 hover:!bg-green-500 hover:!text-bright-200"
                >
                    ADD TO CART
                </x-ui.link>
            </div>


            <div class="flex flex-wrap gap-8 sm:grid sm:grid-cols-2 sm:gap-4">
                <div
                    @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'details' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <x-heroicon-o-bars-3-bottom-left class="w-5"/>
                    <p>DETAILS</p>
                </div>
                <div
                    @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'materials' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <svg class="w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="stroke-red-700 dark:stroke-bright-200"
                              d="M1 8.2C1.702 4.7656 4.303 2.017 7.6654 1.081C7.948 1.0027 8.0884 0.9631 8.1649 1.0468C8.2414 1.1314 8.1847 1.27 8.0731 1.549L7.3 3.25M11.8 1C15.2344 1.702 17.983 4.303 18.919 7.6654C18.9973 7.948 19.0369 8.0884 18.9532 8.1649C18.8686 8.2414 18.73 8.1847 18.451 8.0731L16.75 7.3M19 11.8C18.298 15.2344 15.697 17.983 12.3346 18.919C12.052 18.9973 11.9116 19.0369 11.8351 18.9532C11.7586 18.8686 11.8153 18.73 11.9269 18.451L12.7 16.75M8.2 19C4.7656 18.298 2.017 15.697 1.081 12.3346C1.0027 12.052 0.9631 11.9116 1.0468 11.8351C1.1314 11.7586 1.27 11.8153 1.549 11.9269L3.25 12.7M10 9.1891C8.8183 9.9991 7.3891 11.6011 6.85 14.05M7.6375 11.8936C5.7727 7.579 9.5347 6.1237 12.3976 5.9617C12.7432 5.9419 12.916 5.932 13.0393 6.058C13.1635 6.184 13.1563 6.364 13.1419 6.7222C13.024 9.7066 11.8342 13.8124 7.6375 11.8936Z"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>MATERIALS</p>
                </div>
                <div
                    @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'aftercare' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <x-iconoir-wash class="w-5"/>
                    <p>AFTERCARE</p>
                </div>
                <div
                    @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'manufacturing' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <svg class="w-5 min-w-5" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.90145 7.07446V9.27036C1.90145 10.2348 2.68328 11.0166 3.64772 11.0166C4.32014 11.0166 4.93283 10.6306 5.22301 10.024L5.24629 9.97531C5.55071 9.33899 6.19343 8.93398 6.89882 8.93398H9.33927C10.9961 8.93398 12.3393 10.2771 12.3393 11.934V12.0332C12.3393 13.69 10.9961 15.0332 9.33927 15.0332H2.98348C1.88803 15.0332 1 15.9212 1 17.0167C1 18.1121 1.88803 19.0001 2.98348 19.0001H18.9433C20.0387 19.0001 20.9267 18.1121 20.9267 17.0167V15.9583C20.9267 15.4474 20.5125 15.0332 20.0016 15.0332C19.4906 15.0332 19.0764 14.619 19.0764 14.108V7.07446C19.0764 5.41761 17.7333 4.07446 16.0764 4.07446H4.90145C3.24459 4.07446 1.90145 5.41761 1.90145 7.07446Z"
                            class="stroke-red-700 dark:stroke-bright-200" stroke-width="1.5"/>
                        <path
                            d="M2.7417 13.1519C2.7417 13.5661 3.07749 13.9019 3.4917 13.9019C3.90591 13.9019 4.2417 13.5661 4.2417 13.1519L2.7417 13.1519ZM2.7417 11.4159L2.7417 13.1519L4.2417 13.1519L4.2417 11.4159L2.7417 11.4159Z"
                            fill="black"/>
                        <path
                            d="M19.271 6.20801V6.20801C20.1883 6.20801 20.932 6.95166 20.932 7.86899V9.75497C20.932 10.6723 20.1883 11.416 19.271 11.416V11.416"
                            class="stroke-red-700 dark:stroke-bright-200" stroke-width="1.5"/>
                        <path
                            d="M4.07471 2.58691C4.07471 2.1727 3.73892 1.83691 3.32471 1.83691C2.91049 1.83691 2.57471 2.1727 2.57471 2.58691H4.07471ZM2.57471 2.58691V4.1737H4.07471V2.58691H2.57471Z"
                            class="fill-red-700 dark:fill-bright-200"/>
                        <path
                            d="M16.3628 1C16.3628 0.585786 16.027 0.25 15.6128 0.25C15.1986 0.25 14.8628 0.585786 14.8628 1H16.3628ZM14.8628 1V4.07439H16.3628V1H14.8628Z"
                            class="fill-red-700 dark:fill-bright-200"/>
                        <path
                            d="M15.9492 7.82593C16.4214 7.82601 16.8604 8.23621 16.8604 8.81226C16.8602 9.38812 16.4213 9.79752 15.9492 9.79761C15.4771 9.79761 15.0383 9.38818 15.0381 8.81226C15.0381 8.23615 15.477 7.82593 15.9492 7.82593Z"
                            class="stroke-red-700 dark:stroke-bright-200" stroke-width="1.5"/>
                        <path
                            d="M15.9492 13.0338C16.4214 13.0339 16.8604 13.4441 16.8604 14.0201C16.8602 14.596 16.4213 15.0054 15.9492 15.0055C15.4771 15.0055 15.0383 14.5961 15.0381 14.0201C15.0381 13.444 15.477 13.0338 15.9492 13.0338Z"
                            class="stroke-red-700 dark:stroke-bright-200" stroke-width="1.5"/>
                    </svg>
                    <p>MANUFACTURING</p>
                </div>
            </div>

        </div>
    </section>
    <section class="smooth-content content mb-20">
        <h2 class="mb-8">Complete the Look</h2>
        <x-three-cards id="shop" :products="$products"/>
    </section>
</main>
