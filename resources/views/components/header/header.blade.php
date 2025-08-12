<header
    x-data="{ isHome: window.location.pathname === '/',  cart: false, wishlist: false, mobileMenu: false  }"
    :class="isHome ?
        'absolute top-0 left-0'
        :'relative'"
    class="w-full border-b border-red-100 dark:border-b-0 bg-bright-200 dark:bg-red-700 flex flex-col z-50">

    <livewire:components.cart/>
    <livewire:components.wish-list/>
    <x-login-modal/>

    <x-header.mobile-menu/>

    <!-- Верхняя полоса -->
    <div class="content grid grid-cols-3 items-center py-4 md:hidden">
        <div>
        </div>
        <div>
            <x-logo.logo class="w-28 mx-auto"/>
        </div>
        <div class="text-right flex gap-4 justify-end">
            <x-header.currency-selection/>
            <x-header.mode-toggle/>
        </div>
    </div>

    <!-- Навигация -->
    <div class="content relative grid grid-cols-3 items-center py-2 md:flex md:justify-between">
        <div class="md:flex-1">
            <x-heroicon-c-bars-3 class="w-6 hidden md:block" x-show="!mobileMenu" @click="mobileMenu = true"/>
            <x-heroicon-o-x-mark class="w-8 hidden md:block" x-show="mobileMenu" @click="mobileMenu = false"/>
        </div>
        <div class=" hidden md:block">
            <x-logo class="w-20 md:flex-1 mx-auto"/>
        </div>
        <div class="flex gap-16 justify-center md:hidden group/links">
            <!-- Группа с дропдауном -->
            <div class="group/categories_block inline-block">
                <!-- Триггер -->
                <a wire:navigate href="{{route('portal.shop')}}"
                   class="cursor-pointer group-hover/links:opacity-50 hover:!opacity-100 transition">Shop</a>

                <!-- Дропдаун -->
                <div
                    class="absolute top-8 z-20 left-0
                w-screen bg-bright-200 dark:bg-red-700 px-16 py-8

                 opacity-0 transform translate-y-2
                 transition-all duration-300 ease-in-out

                 pointer-events-none
                 group-hover/categories_block:opacity-100 group-hover/categories_block:translate-y-0 group-hover/categories_block:pointer-events-auto
                 hover:opacity-100 hover:translate-y-0 hover:pointer-events-auto">
                    <x-header.categories/>
                </div>
            </div>

            <!-- Остальные ссылки -->
            <a href="" class=" group-hover/links:opacity-50 hover:!opacity-100 transition">Designers</a>
            <div class="relative group/about">
                <a class=" group-hover/links:opacity-50 hover:!opacity-100 transition">About</a>
                <div class="flex flex-col gap-3 p-5 bg-bright-200 dark:bg-red-500 absolute top-full left-1/2 -translate-x-1/2 opacity-0 group-hover/about:opacity-100 group-hover/about:visible transition invisible text-lg">
                    <a wire:navigate href="{{ route('portal.sustainability')}}" class="group-hover/links:opacity-50 hover:!opacity-100 transition">Sustainability</a>
                    <a wire:navigate href="{{ route('portal.about')}}" class="group-hover/links:opacity-50 hover:!opacity-100 transition">Our Story</a>
                    <a wire:navigate href="{{route('portal.insights')}}" class="group-hover/links:opacity-50 hover:!opacity-100 transition">Journal</a>
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-6 md:flex-1 group/buttons">
            <a class="relative w-fit md:hidden group-hover/buttons:opacity-50 hover:!opacity-100 transition"
               wire:navigate>
                <svg class="w-7 h-5" width="18" height="18" viewBox="0 0 18 18" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.62695 0.0078125C9.95718 0.176558 12.6055 2.93058 12.6055 6.30273L12.5977 6.62695C12.5132 8.29288 11.7815 9.78774 10.6494 10.8662L17.2607 17.4775L16.7383 18L10.082 11.3438C9.0287 12.1346 7.72124 12.6055 6.30273 12.6055L5.97852 12.5977C2.75566 12.4344 0.171117 9.8498 0.0078125 6.62695L0 6.30273C0 2.82184 2.82184 0 6.30273 0L6.62695 0.0078125ZM6.30273 1C3.37412 1 1 3.37412 1 6.30273C1.00001 9.23134 3.37413 11.6055 6.30273 11.6055C9.23133 11.6055 11.6055 9.23133 11.6055 6.30273C11.6055 3.37413 9.23134 1.00001 6.30273 1Z"
                        class="fill-red-700 dark:fill-bright-200"/>
                </svg>
            </a>
            <a class="relative w-fit group-hover/buttons:opacity-50 hover:!opacity-100 transition"
               @Auth
                   wire:navigate
               href="{{route('account.welcome')}}"
               @else
                   onclick="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'auth-modal' }))"
                @endauth
            >
                <svg width="20" class="w-7 h-5" height="18" viewBox="0 0 20 18" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path class="stroke-red-700 dark:stroke-bright-200"
                          d="M4.99902 11.0883H14.0576C16.5429 11.0883 18.5576 13.103 18.5576 15.5883V16.0004C18.5574 16.8286 17.8859 17.5004 17.0576 17.5004H1.99902C1.17071 17.5004 0.499209 16.8286 0.499023 16.0004V15.5883C0.499025 13.103 2.51374 11.0883 4.99902 11.0883Z"/>
                    <circle class="stroke-red-700 dark:stroke-bright-200" cx="9.52924" cy="4.23529" r="3.73529"/>
                </svg>

            </a>
            <a href="{{route('portal.wishlist')}}"
               class="relative w-fit md:hidden group-hover/buttons:opacity-50 hover:!opacity-100 transition"
               wire:navigate>
                <span id="wishlist-badge"
                      class="aspect-square rounded-full bg-red-700 dark:bg-bright-200 dark:text-red-700 absolute -top-2 -right-2 text-white text-xs flex items-center justify-center w-5 h-5 hidden">5</span>
                <svg class="w-7 h-5" width="17" height="20" viewBox="0 0 17 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 3.04685V17.9746C1 18.8854 2.00969 19.3429 2.60031 18.6981L8.5 12.2577L14.3997 18.6981C14.9903 19.3429 16 18.8864 16 17.9746V3.04685C16 2.504 15.8025 1.98337 15.4508 1.59951C15.0992 1.21565 14.6223 1 14.125 1H2.875C2.37772 1 1.90081 1.21565 1.54917 1.59951C1.19754 1.98337 1 2.504 1 3.04685Z"
                        class="stroke-red-700 dark:stroke-bright-200" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </a>
            <a @click="cart = true" class="relative w-fit group-hover/buttons:opacity-50 hover:!opacity-100 transition"
               wire:navigate>
                    <span id="basket-badge"
                          class="aspect-square rounded-full bg-red-700 dark:bg-bright-200 dark:text-red-700 absolute -top-2 -right-2 text-white text-xs flex items-center justify-center w-5 h-5 hidden">5</span>
                <svg class="w-7 h-5" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.45508 4.73532H12.4863C13.1985 4.73535 13.8128 5.236 13.9561 5.93356L15.959 15.6982C16.1498 16.6284 15.4388 17.5 14.4893 17.5H2.45215C1.50256 17.5 0.791608 16.6284 0.982422 15.6982L2.98535 5.93356C3.12859 5.236 3.74294 4.73532 4.45508 4.73532Z"
                        class="stroke-red-700 dark:stroke-bright-200"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.29419 1H9.64713C10.1994 1 10.6471 1.44772 10.6471 2V8.47054H11.6471V2C11.6471 0.895431 10.7517 0 9.64713 0H7.29419C6.18962 0 5.29419 0.895432 5.29419 2V8.47054H6.29419V2C6.29419 1.44772 6.74191 1 7.29419 1ZM7.28023 16.9411C7.28488 16.9412 7.28954 16.9412 7.29419 16.9412H9.64713C9.65179 16.9412 9.65644 16.9412 9.66109 16.9411H7.28023Z"
                          class="fill-red-700 dark:fill-bright-200"/>
                </svg>

            </a>
        </div>
    </div>

</header>
