@props([
    'id'
])
@php
    $elements = [
        [
             'image' => "/fixed/what-matters-1.jpg",
            'text' => 'Innovative Materials'
        ],
        [
            'image' => "/fixed/what-matters-1.jpg",
            'text' => 'Innovative Materials'
        ],
        [
            'image' => "/fixed/what-matters-1.jpg",
            'text' => 'Innovative Materials'
        ]

    ]
@endphp
<div class="swiper w-full relative content md:px-0" id="{{$id}}">
    <x-heroicon-c-chevron-left id="{{$id}}_prev"
                               class="absolute top-1/2 -translate-y-1/2 hidden md:block text-red-700 left-0 w-12 bg-red-100 text-red-100 cursor-pointer z-20 transition"/>
    <x-heroicon-c-chevron-right id="{{$id}}_next"
                                class="absolute top-1/2 -translate-y-1/2 hidden md:block right-0 w-12 text-red-700 bg-red-100 text-red-100 cursor-pointer z-20  transition"/>

    <div class="flex gap-4 w-full swiper-wrapper">
        @foreach($elements as $element)
            <div class="flex flex-col flex-1 md:!flex-none md:!w-[80vw] swiper-slide">
                <a href="/shop?material_focus[0]={{$element['text']}}" wire:navigate class="flex-1 aspect-[1/1.5]">
                    <img src="{{$element['image']}}" class="object-cover  mb-2"
                         alt="">
                </a>

                <x-ui.link-arrow
                    href="/shop?material_focus[0]={{$element['text']}}"
                    text="{{$element['text']}}"
                    textSize="text-lg"
                    class="font-bold"
                    iconSize="h-4 w-4"
                />
            </div>
        @endforeach
    </div>
</div>


@push('page-js')
    <script type="module">
        if (document.documentElement.clientWidth < 768) {
            new Swiper("#{{$id}}", {
                spaceBetween: 0,
                slidesPerView: 'auto',
                loop: true,
                centeredSlides: true,
                initialSlide: 2, // <-- индексация с 0!
                navigation: {
                    nextEl: "#{{$id}}_next",
                    prevEl: "#{{$id}}_prev",
                }
            });
        }

    </script>
@endpush
