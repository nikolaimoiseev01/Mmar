<main>
    <style>
        .post-content p {
            max-width: 648px;
            margin: auto;
        }

        .post-content img {
            margin: auto;
        }

        .attachment__caption {
            display: none;
        }
    </style>
    @section('title')
        {{$post['title']}}
    @endsection
    <section class="w-full flex flex-col mb-24">
        <div class="smooth-content w-full bg-green-300 dark:bg-red-500 pt-12">
            <div class="w-full post-content flex flex-col items-center mx-auto ">
                <div class="grid grid-cols-3  mb-10 w-full">
                    <a wire:navigate href="{{route('portal.insights')}}" class="flex items-center gap-px font-bold">
                        <x-heroicon-c-chevron-left class="w-5"/>
                        <span> Back</span></a>
                    <span
                        class="rounded-3xl mx-auto bg-red-300 dark:bg-red-700 dark:text-bright-200 px-3 py-2 text-bright-200 w-fit">
                    {{$post->postTopic['name']}}
                </span>
                    <div></div>
                </div>

                <h1 class="mb-6 text-5xl max-w-4xl text-center">{{$post['title']}}</h1>
                <p class="max-w-4xl text-center">{{$post['description']}}</p>
            </div>
        </div>

        <div class="smooth-content pt-6 relative w-full mx-auto min-w-full">
            <div class="absolute w-full top-0 left-0 h-1/2 bg-green-300 dark:bg-red-500"></div>
            <div class="post-content  post-content relative mx-auto">
                <img src="{{$post->getFirstMediaUrl('cover')}}" class="w-full max-h-[642px] object-cover" alt="">
            </div>

        </div>

    </section>
    <x-post-content :post="$post"/>

    <div class="smooth-content bg-green-300 dark:bg-red-500 py-20 mt-44">
        <div class="content flex gap-16 md:flex-col">
            <div class="flex flex-col gap-4">
                <h2 class="text-nowrap md:text-center">You May Also Like</h2>
                <p class=" md:text-center">The latest new, interviews, and resources.</p>
                <x-ui.link-arrow
                    href="{{route('portal.insights')}}"
                    text="View All"
                    textSize="text-lg"
                    class="font-bold md:mx-auto text-center"
                    iconSize="h-4 w-4"
                />
            </div>
            <div class="flex gap-4 md:flex-col">
                @foreach($other_posts as $post)
                    <x-post-card :post="$post"/>
                @endforeach
            </div>
        </div>
    </div>
</main>
