<main class="flex-1 mx-4">
    @section('title')
        Sustainability
    @endsection
    <style>
        /*#image-expand img {*/
        /*    width: 100%;*/
        /*    max-width: 448px;*/
        /*    transition: width 0.2s ease;*/
        /*}*/
    </style>
    <x-page-title class="mb-12 content sm:text-3xl">MMAR emerged from a desire to create a simplified shopping
        experience tailored
        for fashion enthusiasts who value conscious choices.
    </x-page-title>
    <p class="smooth-content mb-24 sm:mb-10 max-w-2xl  mx-auto sm:text-base">Our journey began with the goal of
        combining our love for fashion with a
        commitment to sustainability and ethical practices.
        <br><br>
        Growing up, we were inspired by our parents’ fashion choices, which beautifully showcased their cultural
        heritage and individuality. Through them, we learned that fashion isn’t just about appearance; it’s about
        expressing oneself with confidence and pride.</p>
    <div
        class=" flex flex-col gap-4 min-w-[448px] sm:min-w-full mb-24 mx-auto sm:mb-10">
        <img id="image-expand" src="/fixed/about-1.png" class="mx-auto w-[30vw] sm:w-full sm:max-w-lg max-w-full"
             alt="">
        <p class="font-bold max-w-2xl mx-auto">"Land Day", a Poster by the GUPW, 1977 </p>
        <p class="max-w-2xl sm:text-base mx-auto">Issued by the General Union of Palestinian Women on Land Day in 1977,
            this
            poster shows a cubist painting by
            Palestinian artist Mona al-Saudi.</p>
    </div>
    <script type="module">
        if (document.documentElement.clientWidth > 768) {
            gsap.registerPlugin(ScrollTrigger);

            const img = document.querySelector('#image-expand');

            gsap.to(img, {
                scrollTrigger: {
                    trigger: "#image-expand",
                    start: "center center",
                    end: "+=400", // или подбери вручную, насколько долго будет "залипание"
                    scrub: true,
                    // pin: true,
                    pinSpacing: true,
                    // markers: true
                },
                width: "50vw", // Конечная ширина
                ease: "none"
            });
        }
    </script>

    <p class="smooth-content max-w-2xl mb-24 mx-auto sm:text-base sm:mb-10">As Palestinians growing up in a western
        country, we experienced a blend of
        cultural traditions and modern influences that have shaped our unique perspective on garments and design. Our
        origins have also made us understand the importance of preserving traditions and costumes as a form of
        resistance and self-determination.This is something we had the pleasure of experiencing in the place where we
        grew up, which taught us to embrace balance and respect for the surrounding nature and traditions. We consider
        this the core of Sardinia, an island in the middle of the Mediterranean Sea, where the beauty of breathtaking
        coastlines and emerald waters merges with the deep-rooted spirit of the uplands and the people of the land.
        Experiencing all of this has provided us with the opportunity to understand the importance of integrating such
        harmony into every aspect of someone’s existence.</p>
    <x-page-title class="smooth-content mb-12 content sm:text-3xl sm:mb-6">As devoted fashion enthusiasts, shopping was
        more than a pastime— it was a way
        to express love and bond with our family.
    </x-page-title>
    <p class="smooth-content max-w-2xl mx-auto mb-24 sm:text-base">Nearly a decade ago, we embarked on our journey
        towards a lifestyle free from
        animal
        exploitation. As devoted fashion enthusiasts, shopping was more than a pastime—it was a way to express love and
        bond with our family. Our passion for design, trends, and innovation was evident in our wardrobe, which ranged
        from fast fashion to luxury pieces, ensuring we always had something new to wear.
        <br><br>
        However, reconciling our dedication to fashion with our commitment to sustainability and respect for all forms
        of life presented a unique challenge. We recognized that the current fashion system often exploits humans,
        animals, and the planet through unsustainable and unethical practices.</p>
    <div class="smooth-content flex flex-col gap-4 mb-24 sm:mb-10 mx-auto items-center w-full max-w-4xl">
        <img src="/fixed/about-2.png" class="mx-auto w-full" alt="">
        <p class="font-bold">Untitled - by Sardinian artist Angelo Maggi</p>
    </div>
    <p class="smooth-content max-w-2xl mx-auto mb-24 sm:mb-10 sm:text-base">If being passionate consumers, immersed in
        the struggle to balance the desire for
        cool garments with the need to adhere to our own values, wasn’t enough, fashion also became the essence of our
        career. Through various experiences, we gained expertise and insight, which made us more aware of the missing
        link between fashion and genuine sustainability. This awareness inspired us to seek innovative solutions and
        ultimately paved the way for a more conscious, ethical approach to fashion.
        <br><br>
        This inspired us to create MMAR, a marketplace that values ethical practices, sustainability, community, and
        cultural diversity.</p>
    <x-page-title class="smooth-content mb-12 content sm:text-3xl sm:mb-6">Redefining Fashion with Creativity,
        Innovation, and a Deep Commitment to Ethics
        and Sustainability
    </x-page-title>
    {{--    <x-carousel/>--}}
    <x-about-cards id="aboutCards"/>
    {{--        <section class="smooth-content pb-20 bg-bright-200 dark:bg-red-700 relative pt-16 sm:py-4 sm:mb-20" id="whatMattersBlock">--}}
    {{--            <div class="mb-4 content flex justify-between  gap-4 md:flex-col">--}}
    {{--                <h2>Find What Matters to You</h2>--}}
    {{--                <x-ui.link-arrow--}}
    {{--                    href="/about"--}}
    {{--                    text="View All"--}}
    {{--                    textSize="text-base"--}}
    {{--                    iconSize="h-4 w-4"--}}
    {{--                    class="sm:hidden"--}}
    {{--                />--}}
    {{--            </div>--}}
    {{--            <x-three-vertical-cards id="whatMattersSlider"/>--}}
    {{--        </section>--}}
</main>
