<main x-data="{ shopFilters: false }">
    @section('title')
        Shop
    @endsection
    <x-page-title>
        @if($isWishlist)
            Wishlist
        @else
            New In
        @endif
    </x-page-title>

    <x-shop-filters :hasAnyFilter="$hasAnyFilter"/>

    <div class="smooth-content relative z-10 flex justify-between content mb-7 gap-4 sm:flex-wrap">
        <a class="flex gap-2 items-center sm:order-2" @click="shopFilters = true">
            <svg width="24" height="15" viewBox="0 0 24 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="2" width="13" height="1" class='fill-red-700 dark:fill-bright-200'/>
                <rect x="20" y="2" width="4" height="1" class='fill-red-700 dark:fill-bright-200'/>
                <rect y="7" width="3" height="1" class='fill-red-700 dark:fill-bright-200'/>
                <rect x="10" y="7" width="14" height="1" class='fill-red-700 dark:fill-bright-200'/>
                <rect y="12" width="10" height="1" class='fill-red-700 dark:fill-bright-200'/>
                <rect x="17" y="12" width="7" height="1" class='fill-red-700 dark:fill-bright-200'/>
                <circle cx="16.5" cy="2.5" r="2" class="stroke-red-700 dark:stroke-bright-200"/>
                <circle cx="6.5" cy="7.5" r="2" class="stroke-red-700 dark:stroke-bright-200"/>
                <circle cx="13.5" cy="12.5" r="2" class="stroke-red-700 dark:stroke-bright-200"/>
            </svg>

            <p class="whitespace-nowrap">Show All Filters</p>
            @if($hasAnyFilter)
                <span class="rounded-full w-2 h-2 bg-red-700"></span>
            @endif
        </a>

        @if($filtersArray && $hasAnyFilter)
            <div class="flex gap-4 flex-wrap sm:order-3 sm:w-full">
                @foreach($filtersArray as $key => $filter)
                    @foreach($filter as $value)
                        <div class="inline-block border border-red-700 dark:border-bright-200 px-3 py-1 flex gap-2">
                            <span>{{$value}}</span>
                            <x-heroicon-o-x-mark
                                wire:click="removeFilter('{{ $key }}', '{{ $value }}')"
                                class="w-4 cursor-pointer"
                            />
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endif

        <x-ui.dropdown class="sm:order-2" align="right" width="48">
            <x-slot name="trigger">
                <a class="flex gap-2">
                    <p class="whitespace-nowrap">Sort By</p>
                    <x-heroicon-o-chevron-down class="w-4"/>
                </a>
            </x-slot>

            <x-slot name="content">
                <button wire:click="setSort('Relevance')"
                        class="@if($sortBy === 'Relevance')font-bold @endif block w-full text-left px-4 py-2 hover:bg-gray-200 hover:dark:bg-blue-300 hover:dark:!text-red-700 transition">
                    Relevance
                </button>
                <button wire:click="setSort('Newest Arrivals')"
                        class="@if($sortBy === 'Newest Arrivals')font-bold @endif block w-full text-left px-4 py-2 hover:bg-gray-200 hover:dark:bg-blue-300 hover:dark:!text-red-700 transition">
                    Newest Arrivals
                </button>
                <button wire:click="setSort('Bestsellers')"
                        class="@if($sortBy === 'Bestsellers')font-bold @endif block w-full text-left px-4 py-2 hover:bg-gray-200 hover:dark:bg-blue-300 hover:dark:!text-red-700 transition">
                    Bestsellers
                </button>
                <button wire:click="setSort('Price: Low to High')"
                        class="@if($sortBy === 'Price: Low to High')font-bold @endif block w-full text-left px-4 py-2 hover:bg-gray-200 hover:dark:bg-blue-300 hover:dark:!text-red-700 transition">
                    Price: Low to High
                </button>
                <button wire:click="setSort('Price: High to Low')"
                        class="@if($sortBy === 'Price: High to Low')font-bold @endif block w-full text-left px-4 py-2 hover:bg-gray-200 hover:dark:bg-blue-300 hover:dark:!text-red-700 transition">
                    Price: High to Low
                </button>
            </x-slot>
        </x-ui.dropdown>
    </div>

    <div class="smooth-content grid grid-cols-3 md:grid-cols-3 sm:!grid-cols-2 gap-4 content">
        @forelse($products as $product)
            <x-product-card :product="$product" shopMode="true"/>
        @empty
            <h3>No products found</h3>
        @endforelse
    </div>

        <script type="module">
            setTimeout(function() {
                lenis.start();
            }, 100)
        </script>
</main>
