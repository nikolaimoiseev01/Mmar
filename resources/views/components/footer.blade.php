<footer class="border-t border-red-100 mt-20 py-8">
    <div class="content flex gap-16 justify-between">
        <div class="flex flex-col gap-4">
            <p class="font-bold mb-4">Shop</p>
            <a href="" class="text-red-100 transition hover:text-red-700">New In</a>
            @foreach(array_slice($categories, 0, 3) as $category)
                <a wire:navigate href="{{ route('portal.shop') }}?category[0]={{ $category['name'] }}" class="text-red-100 transition hover:text-red-700">{{$category['name']}}</a>
            @endforeach
        </div>
        <div class="flex flex-col gap-4">
            @foreach(array_slice($categories, 4, 9) as $category)
                <a wire:navigate href="{{ route('portal.shop') }}?category[0]={{ $category['name'] }}" class="text-red-100 transition hover:text-red-700">{{$category['name']}}</a>
            @endforeach
        </div>

        @foreach($menu as $key=>$links)
            <div class="flex flex-col gap-4">
                <p class="font-bold mb-4">{{$key}}</p>
                @foreach($links as $link)
                    <a wire:navigate href="{{$link['url']}}" class="text-red-100 transition hover:text-red-700">{{$link['name']}}</a>
                @endforeach
            </div>
        @endforeach

        <div class="flex flex-col gap-4">
            <p class="font-bold mb-4">Newsletter</p>
            <p href="" class="text-red-100 transition hover:text-red-700">Sign up to our newsletter and<br> get 15% Off Your First Purchase</p>
        </div>
    </div>
</footer>
