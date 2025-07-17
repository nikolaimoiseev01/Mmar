<div class="flex gap-16 w-full justify-center flex-wrap md:justify-between group/categories">
    @foreach ($categories as $category)
        <a wire:navigate href="{{ route('portal.shop') }}?category[0]={{ $category['name'] }}"
           class="flex flex-col gap-3 max-h-28 justify-center items-center text-center group-hover/categories:opacity-50 hover:!opacity-100 ">
            <img src="{{ $category->getFirstMediaUrl('cover') }}"
                 class="h-16 w-14 hover:scale-110 transition"
                 alt="">
            <p>{{ $category['name'] }}</p>
        </a>
    @endforeach
</div>

