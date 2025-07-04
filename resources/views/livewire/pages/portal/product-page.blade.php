<main class="flex-1">
    @section('title')
        {{$product['slug']}}
    @endsection
        <x-modal-product-info name="product-info" :tabs="['details', 'materials', 'aftercare', 'manufacturing']">
        </x-modal-product-info>
    <section class="flex mb-52">
        <div class="bg-bright-300 w-1/2 aspect-square">
            <x-product-examples-slider :examples="$product->getMedia('examples')"/>
        </div>
        <div class="flex flex-col pt-20 pl-10 pr-6 w-1/2">
            <div class="w-full flex justify-between items-end">
                <h1>{{$product['name']}}</h1>
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
                <p>SIZE</p>
                <div class="flex gap-2 text-base">
                    <span class="p-4 rounded bg-red-700 cursor-pointer text-bright-200 flex items-center justify-center">10</span>
                    <span class="p-4 rounded bg-red-100 cursor-pointer flex items-center justify-center">11</span>
                    <span class="p-4 rounded bg-red-100 cursor-pointer flex items-center justify-center">11</span>
                </div>
            </div>
            <div class="flex flex-col mb-14">
                <p>MATERIALS:</p>
                <p>Apple Leather, Rubber, Tea Leather</p>
            </div>


            <x-ui.link
                id="big-basket-button-{{$product['id']}}"
                wire:ignore
                wire:click="addIdToCookie()"
                class="mb-8"
            >
                ADD TO CART
            </x-ui.link>




            <div class="flex">
                <div @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'details' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <img src="/fixed/icon-details.svg" class="w-5" alt="">
                    <p>DETAILS</p>
                </div>
                <div @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'materials' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <img src="/fixed/icon-materials.svg" class="w-5" alt="">
                    <p>MATERIALS</p>
                </div>
                <div @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'aftercare' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <img src="/fixed/icon-aftercare.svg" class="w-5" alt="">
                    <p>AFTERCARE</p>
                </div>
                <div @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { name: 'product-info', tab: 'manufacturing' } }))"
                    class="flex gap-2 flex-1 cursor-pointer">
                    <img src="/fixed/icon-manufacturing.svg" class="w-5" alt="">
                    <p>MANUFACTURING</p>
                </div>
            </div>

        </div>
    </section>
    <section class="content mb-52">
        <h2 class="mb-8">Complete the Look</h2>
        <x-three-cards :products="$products"/>
    </section>
</main>
