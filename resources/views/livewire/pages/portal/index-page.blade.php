<main class="flex-1">
    @section('title')
        Main
    @endsection
    <section class="smooth-content w-full h-screen relative flex items-center justify-center mb-44">
        <img src="/fixed/welcome-bg.jpg" class="absolute w-full h-full object-cover" alt="">
        <div class="flex flex-col items-center relative gap-2">
            <x-logo.logo-text class="w-60 md:w-44"/>
        </div>
    </section>

    <section class="smooth-content mb-20">
        <div class="mb-4 flex justify-between content gap-4">
            <h2>Just In</h2>
            <x-ui.link-arrow
                href="{{route('portal.shop')}}"
                text="View All"
                textSize="text-base"
                iconSize="h-4 w-4"
            />
        </div>
        <x-three-cards id="index1" :products="$products"/>
    </section>

    <section class="smooth-content flex md:flex-col mb-20 pl-6 md:pl-0 h-screen min-h-screen sm:h-auto"
             id="welcomeSection">
        <div class="w-1/2 md:w-full md:px-6 flex flex-col pt-32 sm:pt-4 gap-12">
            <p class="font-[Forum] text-2xl leading-relaxed">
                Welcome to MMAR,<br>
                the ultimate destination where next-gen fashion is curated,<br>
                connecting you with innovative, sustainable, high-quality design<br>
                and choices.
            </p>
            <p class="font-[Forum] text-2xl leading-relaxed">
                Our selection will prove that fashion can be a celebration of<br>
                creativity, art, cultures and respect for nature, including the people,<br>
                the animals and the planet
            </p>
            <x-ui.link-arrow
                href="/about"
                text="Learn More About Us"
                textSize="text-2xl"
                iconSize="h-6 w-6"
            />
        </div>

        <img class="w-1/2 md:w-full max-h-[800px] object-right object-contain" src="/fixed/welcome2.png" alt="">
    </section>

    <section class="smooth-content pb-20 bg-bright-200 dark:bg-red-700 relative pt-16 sm:py-4 sm:mb-20"
             id="whatMattersBlock">
        <div class="mb-4 content flex justify-between  gap-4 md:flex-col">
            <h2>Find What Matters to You</h2>
            <x-ui.link-arrow
                href="/about"
                text="View All"
                textSize="text-base"
                iconSize="h-4 w-4"
                class="sm:hidden"
            />
        </div>
        <x-three-vertical-cards id="whatMattersSlider"/>
    </section>

    @push('page-js')
        <script type="module">
            window.addEventListener('load', () => {
                if (window.innerWidth > 768) {
                    $('#whatMattersBlock').removeClass('smooth-content');
                    ScrollTrigger.create({
                        trigger: "#welcomeSection",
                        start: "top top",
                        endTrigger: "#whatMattersBlock",
                        end: "top top",
                        pinSpacing: false,
                        pin: true,
                        scrub: true
                    });

                    // Нужно на мобилках
                    setTimeout(() => {
                        ScrollTrigger.refresh();
                    }, 100);

                } else {

                }
            });
        </script>
    @endpush


    <section class="smooth-content mb-20 bg-bright-200 dark:bg-red-700 relative">
        <div class="content">
            <h2 class="mb-4">Recommended Just for You</h2>
        </div>
        <x-three-cards id="index2" :products="$products"/>
    </section>


    <section class="smooth-content content mb-20">
        <h2 class="mb-4">Insights and Inspiration</h2>
        <div class="flex gap-4 bg-green-300 dark:bg-red-500 p-4 md:flex-col">
            <img src="{{$post->getFirstMediaUrl('cover')}}" class="w-2/3 min-w-2/3 md:order-2 md:w-full object-cover"
                 alt="">
            <div class="flex flex-col gap-6 w-1/3 md:w-full">
                <span class="rounded-3xl bg-red-300 px-3 py-2 text-bright-200 w-fit">
                    {{$post->postTopic['name']}}
                </span>
                <h3 class="text-2xl font-bold">
                    {{$post['title']}}
                </h3>
                <p class="font-base">{{$post['description']}}</p>
                <div class="flex justify-between mt-auto">
                    <p class="opacity-40">{{ $post['created_at']->format('F d, Y') }}</p>
                    <x-ui.link-arrow
                        href="{{route('portal.post', $post['id'])}}"
                        text="Read"
                        textSize="text-lg"
                        class="font-bold"
                        iconSize="h-4 w-4"
                    />
                </div>
            </div>
        </div>
    </section>

    <section class="smooth-content relative flex flex-col items-center justify-center py-40 -mb-32">
        <img src="/fixed/subscribe-bg.png" class="w-full h-full absolute object-cover" alt="">
        <div class="content flex flex-col items-center">
            <h2 class="text-white relative text-center mb-9">
                Enjoy 15% Off Your First Purchase
            </h2>
            <livewire:components.subscribe-form class="mb-4"/>
            <p class="relative text-white">We respect your privacy. Unsubscribe anytime.</p>
        </div>

    </section>


</main>
