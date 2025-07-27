<style>
    .swiper-pagination-bullet-active {
        background-color: #240309 !important;
    }
</style>
<div class="swiper productExamples relative"
     :class="open ? '!fixed h-[90vh] !z-[9999] aspect-square top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2' : 'hidden'">
    <x-heroicon-c-chevron-left class="absolute top-1/2 -translate-y-1/2 left-4 w-12 prevEx text-red-100 cursor-pointer z-20 hover:scale-110 hover:text-red-700 transition"/>
    <x-heroicon-c-chevron-right class="absolute top-1/2 -translate-y-1/2 right-4 w-12 nextEx text-red-100 cursor-pointer z-20 hover:scale-110 hover:text-red-700 transition"/>
    <div class="swiper-wrapper relative">
        @foreach($examples as $example)
            <div class="swiper-slide  w-full h-full">
                <img src="{{$example->getUrl()}}" class="w-full h-full object-cover" alt="">
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

@push('page-js')
    <script type="module">
        var swiper2 = new Swiper(".productExamples", {
            spaceBetween: 0,
            slidesPerView: 1,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".nextEx",
                prevEl: ".prevEx",
            }
        });
    </script>
@endpush
