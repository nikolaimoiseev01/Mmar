<div class="flex gap-16 w-full justify-center flex-wrap md:justify-between sm:gap-4 sm:grid sm:grid-cols-4 group/categories">
    <a wire:navigate href="{{ route('portal.shop') }}"
       class="flex flex-col gap-3 max-h-28 justify-center items-center text-center group-hover/categories:opacity-50 hover:!opacity-100 ">
        <img src="/fixed/icon-new-in.svg"
             class="h-16 w-14 hover:scale-110 transition"
             alt="">
        <p>New In</p>
    </a>
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

