<main class="flex-1">
    @section('title')
        Insights and Inspiration
    @endsection
    <x-page-title>Insights and Inspiration</x-page-title>

    <div class="grid grid-cols-2 gap-x-4 gap-y-16 content">
        @foreach($posts as $post)
            <x-post-card class="col-span-1" :post="$post"/>
        @endforeach
    </div>

</main>
