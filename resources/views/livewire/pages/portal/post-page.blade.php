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
        <div class="w-full bg-green-300 dark:bg-red-100 pt-12">
            <div class="w-full post-content flex flex-col items-center mx-auto ">
                <span class="rounded-3xl bg-red-100 px-3 py-2 text-bright-200 w-fit mb-10">
                    {{$post->postTopic['name']}}
                </span>
                <h1 class="mb-6 max-w-4xl text-center">{{$post['title']}}</h1>
                <p class="max-w-4xl text-center">{{$post['description']}}</p>
            </div>
        </div>

        <div class="pt-6 relative w-full mx-auto min-w-full">
            <div class="absolute w-full top-0 left-0 h-1/2 bg-green-300 dark:bg-red-100"></div>
            <div class="post-content  post-content relative mx-auto">
                <img src="{{$post->getFirstMediaUrl('cover')}}" class="w-full max-h-[642px] object-cover" alt="">
            </div>

        </div>

    </section>
    <x-post-content :post="$post"/>

    <div class="bg-green-300 py-20">
        <div class="content flex gap-16">
            <div class="flex flex-col">
                <h2 class="text-nowrap">You May Also Like</h2>
                <p class="mb-8">The latest new, interviews, and resources.</p>
                <x-ui.link-arrow
                    href="{{route('portal.insights')}}"
                    text="View All"
                    textSize="text-lg"
                    class="font-bold"
                    iconSize="h-4 w-4"
                />
            </div>
            <div class="flex gap-4">
                @foreach($other_posts as $post)
                    <x-post-card :post="$post"/>
                @endforeach
            </div>
        </div>
    </div>
</main>
