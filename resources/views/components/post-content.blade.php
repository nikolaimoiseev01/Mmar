@props([
    'post'
])


<div class="container mx-auto flex max-w-7xl px-6 py-10 gap-8">

    <!-- Main Article -->
    <main class="w-2/3 space-y-12 lg:w-full">
        <article class="space-y-12 pr-6">
            @foreach($post['content'] as $topic)
                <div class="">
                    <h2 id="{{Str::slug($topic['title'])}}" class="text-2xl font-bold scroll-mt-12 mb-6">{{$topic['title']}}</h2>
                    {!! $topic['text'] !!}
                </div>
            @endforeach
        </article>
    </main>

    <!-- Table of Contents -->
    <aside class="w-1/3 lg:hidden">
        <div class="sticky top-20 p-4 border-l border-gray-300">
            <h3 class="font-bold text-red-100 mb-4">Table of Contents</h3>
            <nav class="space-y-2 mb-10">
                @foreach($post['content'] as $topic)
                    <a href="#{{Str::slug($topic['title'])}}"
                       class="block hover:underline">
                        {{$topic['title']}}
                    </a>
                @endforeach
            </nav>
            <div class="flex flex-col gap-2">
                <h3 class="font-bold text-red-100 mb-4">Newsletter</h3>
                <p>Sign up to our newsletter and get 15% Off Your First Purchase</p>
                <livewire:components.subscribe-form/>
            </div>

        </div>
    </aside>
</div>

<script>
    let tocObserver = null;

    function setupTocObserver() {
        if (tocObserver) tocObserver.disconnect();

        const $tocLinks = document.querySelectorAll('aside nav a');

        tocObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;

                    $tocLinks.forEach(link => {
                        const isActive = link.getAttribute('href') === `#${id}`;
                        link.classList.toggle('text-red-500', isActive);
                        link.classList.toggle('font-bold', isActive);
                        link.classList.toggle('underline', isActive);
                    });
                }
            });
        }, {
            rootMargin: '0px 0px -70% 0px',
            threshold: 0
        });

        document.querySelectorAll('main h2[id]').forEach(h2 => {
            tocObserver.observe(h2);
        });
    }

    window.addEventListener('load', setupTocObserver);

    document.addEventListener('livewire:navigated', () => {
        setTimeout(setupTocObserver, 100);
    });
</script>





{{--<section class="content post-content">--}}
{{--    {!! $post['content'] !!}--}}
{{--</section>--}}
