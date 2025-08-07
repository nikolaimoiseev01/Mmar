@props([
    'id'
])
@php
    $elements = [
        [
            'img' => '/fixed/innovation.jpg',
            'title' => 'Innovation',
            'description' => "Embracing new technologies not only for their cool factor but also for their potential to drive progress and reduce the fashion industry's impact."
        ],
        [
            'img' => '/fixed/fassion.png',
            'title' => 'Fashion as Art',
            'description' => "Celebrating the creative process in every garment, honouring the designers' vision, and emphasising the importance of details that elevate ideas into wearable works of art."
        ],
        [
            'img' => '/fixed/care.png',
            'title' => 'Care',
            'description' => "Valuing the people who create our clothes, the lands where raw materials are sourced, the stories behind each garment, and how these pieces become part of our personal histories."
        ]
    ]
@endphp
<div class="smooth-content swiper w-full relative content md:px-0" id="{{$id}}">
{{--    <x-heroicon-c-chevron-left id="{{$id}}_prev"--}}
{{--                               class="absolute top-1/2 -translate-y-1/2 hidden md:block text-red-700 left-0 w-12 bg-red-100 text-red-100 cursor-pointer z-20 transition"/>--}}
{{--    <x-heroicon-c-chevron-right id="{{$id}}_next"--}}
{{--                                class="absolute top-1/2 -translate-y-1/2 hidden md:block right-0 w-12 text-red-700 bg-red-100 text-red-100 cursor-pointer z-20  transition"/>--}}

    <div class="flex gap-4 md:gap-0 swiper-wrapper">
        @foreach($elements as $element)
            <div class="swiper-slide flex-1 md:flex-auto md:max-w-[70vw] !flex aspect-square bg-cover bg-center items-end text-bright-200 rounded-2xl"
                 style="background-image: url('{{ $element['img'] }}');">
                <div class="bg-gradient-to-b from-transparent to-[#000000ba] rounded-b-2xl p-4 mt-auto">
                    <h3 class="uppercase !font-normal text-lg">{{ $element['title'] }}</h3>
                    <p>{{ $element['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>


@push('page-js')
    <script type="module">
        if (document.documentElement.clientWidth < 768) {
            new Swiper("#{{$id}}", {
                spaceBetween: 20,
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
