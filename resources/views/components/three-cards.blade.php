@props([
    'id'
])
<div class="swiper w-full relative content md:px-0"  id="{{$id}}">
{{--    <x-heroicon-c-chevron-left id="{{$id}}_prev"--}}
{{--                               class="absolute top-1/2 -translate-y-1/2 hidden md:flex items-center justify-center left-10 sm:left-4 w-10 h-10 text-red-700 dark:text-white hover:scale-110 hover:rotate-[-6deg] rounded-xl cursor-pointer z-20 transition duration-300"--}}
{{--    />--}}
{{--    <x-heroicon-c-chevron-right id="{{$id}}_next"--}}
{{--                                class="absolute top-1/2 -translate-y-1/2 hidden md:flex items-center justify-center right-10 sm:right-4 w-10 h-10  text-red-700 dark:text-white hover:scale-110 hover:rotate-[6deg] rounded-xl cursor-pointer z-20 transition duration-300"--}}
{{--    />--}}
    <div class="flex gap-4 md:gap-0 w-full swiper-wrapper">
        @foreach($products as $product)
            <x-product-card :product="$product" class="flex-1 md:!flex-none max-w-[80vw]  swiper-slide "/>
        @endforeach
    </div>
</div>


@push('page-js')
    <script type="module">
        if(document.documentElement.clientWidth < 768) {
            new Swiper("#{{$id}}", {
                spaceBetween: 20,
                slidesPerView: 'auto',
                loop: true,
                // allowTouchMove: false,
                centeredSlides: true,
                preventClicks: false,        // Разрешить клики
                initialSlide: 2, // <-- индексация с 0!
                navigation: {
                    nextEl: "#{{$id}}_next",
                    prevEl: "#{{$id}}_prev",
                }
            });
        }

        document.querySelector("#{{$id}}").addEventListener('click', (e) => {
            const link = e.target.closest('a[wire\\:navigate]');
            if (link) {
                e.preventDefault(); // не даём Swiper или браузеру блокировать
                window.Livewire.navigate(link.getAttribute('href'));
            }
        });

    </script>
@endpush
