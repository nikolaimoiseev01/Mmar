<main class="flex-1">
    @section('title')
        Insights and Inspiration
    @endsection
    <div class="content">
        <x-page-title class="mb-8">Insights and Inspiration</x-page-title>
    </div>
        <style>
            .no-scrollbar {
                scrollbar-width: none; /* Firefox */
                -ms-overflow-style: none; /* IE 10+ */
            }

            .no-scrollbar::-webkit-scrollbar {
                display: none; /* Chrome, Safari, Opera */
            }
        </style>
    <div class="smooth-content flex flex-wrap gap-4 my-8 mx-auto w-fit justify-center max-w-5xl sm:flex-nowrap sm:flex-row items-center overflow-x-auto sm:px-4 no-scrollbar sm:max-w-full sm:justify-start">
        @foreach($postTopics as $topic)
            <button
                type="button"
                wire:click="toggleTopic({{ $topic['id'] }})"
                class="border rounded-3xl p-2 px-4 transition sm:w-max sm:min-w-max sm:text-base
                {{ in_array($topic['id'], $selectedTopics)
                    ? 'bg-red-300 text-red-300 border-red-300 hover:!text-bright-200'
                    : 'text-red-300 border-red-300 hover:!text-bright-200 hover:bg-red-300' }}"
            >
                {{ $topic['name'] }}
            </button>
        @endforeach
    </div>
    <div class="smooth-content grid grid-cols-2 md:grid-cols-1 gap-x-4 gap-y-16 content">
        @foreach($posts as $post)
            <x-post-card class="col-span-1" :post="$post"/>
        @endforeach
    </div>

</main>
