<footer
    x-data="{ isHome: window.location.pathname === '/'}"
    :class="isHome ?
        '!border-none'
        :''"
    class="pt-8 pb-2 flex flex-col border-t border-red-50 mt-32">
    <div class="content flex gap-16 md:gap-8 justify-between mb-12">
        <div class="flex flex-col gap-4 md:hidden">
            <p class="font-bold">Shop</p>
            <a href="" class="text-red-300 transition hover:text-red-700">New In</a>
            @foreach(array_slice($categories, 0, 3) as $category)
                <a wire:navigate href="{{ route('portal.shop') }}?category[0]={{ $category['name'] }}" class="text-red-300 transition hover:text-red-700">{{$category['name']}}</a>
            @endforeach
        </div>
        <div class="flex flex-col gap-4 md:hidden">
            @foreach(array_slice($categories, 4, 9) as $category)
                <a wire:navigate href="{{ route('portal.shop') }}?category[0]={{ $category['name'] }}" class="text-red-300 transition hover:text-red-700">{{$category['name']}}</a>
            @endforeach
        </div>

        @foreach($menu as $key=>$links)
            <div class="flex flex-col gap-4">
                <p class="font-bold">{{$key}}</p>
                @foreach($links as $link)
                    <a wire:navigate href="{{$link['url']}}" class="text-red-300 transition hover:text-red-700">{{$link['name']}}</a>
                @endforeach
            </div>
        @endforeach

        <div class="flex flex-col gap-4 md:hidden">
            <p class="font-bold">Newsletter</p>
            <p href="" class="text-red-300 transition hover:text-red-700">Sign up to our newsletter and<br> get 15% Off Your First Purchase</p>
        </div>
    </div>

    <div class="flex flex-col items-center gap-6 mx-auto">
        <div class="flex flex-col items-center">
            <x-logo.logo-text-dark class="w-40 md:w-28 dark:hidden"/>
            <x-logo.logo-text class="w-40 md:w-28 hidden dark:block"/>
        </div>

        <div class="flex gap-4 text-sm text-red-300 content md:flex-wrap sm:justify-center">
            <span>Copyright © 2024 MMAR</span>
            <div class="bg-red-100 w-px"></div>
            <a href="" class="text-sm">Returns Policy</a>
            <div class="bg-red-100 w-px"></div>
            <a href="" class="text-sm">Privacy Policy</a>
            <div class="bg-red-100 w-px"></div>
            <a href="" class="text-sm">Terms of Service</a>
            <div class="bg-red-100 w-px"></div>
            <a href="" class="text-sm">Cookie Policy</a>
        </div>
    </div>
</footer>
