<header
    x-data="{ isHome: window.location.pathname === '/',  cart: false, wishlist: false, mobileMenu: false  }"
    :class="isHome ?
        'absolute top-0 left-0'
        :'relative'"
    class="w-full border-b border-red-100 bg-bright-200 dark:bg-red-700 flex flex-col z-50">

    <livewire:components.cart/>
    <livewire:components.wish-list/>
    <x-login-modal/>

    <x-header.mobile-menu/>

    <!-- Верхняя полоса -->
    <div class="content grid grid-cols-3 items-center py-4 md:hidden">
        <div>
        </div>
        <div>
            <x-logo class="w-28 mx-auto"/>
        </div>
        <div class="text-right flex gap-4 justify-end">
            <x-header.currency-selection/>
            <x-header.mode-toggle/>
        </div>
    </div>

    <!-- Навигация -->
    <div class="content relative grid grid-cols-3 items-center py-2 md:flex md:justify-between">
        <div class="md:flex-1">
            <x-heroicon-c-bars-3 class="w-6 hidden md:block" @click="mobileMenu = true"/>
        </div>
        <div class=" hidden md:block">
            <x-logo class="w-20 md:flex-1 mx-auto"/>
        </div>
        <div class="flex gap-16 justify-center md:hidden group/links">
            <!-- Группа с дропдауном -->
            <div class="group/categories_block inline-block">
                <!-- Триггер -->
                <a wire:navigate href="{{route('portal.shop')}}" class="cursor-pointer group-hover/links:opacity-50 hover:!opacity-100 transition">Shop</a>

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
            <a wire:navigate href="{{ route('portal.about') }}" class=" group-hover/links:opacity-50 hover:!opacity-100 transition">About</a>
        </div>
        <div class="flex justify-end gap-6 md:flex-1 group/buttons">
            <a class="relative w-fit md:hidden group-hover/buttons:opacity-50 hover:!opacity-100 transition" wire:navigate>
                <svg class="w-7 h-5" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.62695 0.0078125C9.95718 0.176558 12.6055 2.93058 12.6055 6.30273L12.5977 6.62695C12.5132 8.29288 11.7815 9.78774 10.6494 10.8662L17.2607 17.4775L16.7383 18L10.082 11.3438C9.0287 12.1346 7.72124 12.6055 6.30273 12.6055L5.97852 12.5977C2.75566 12.4344 0.171117 9.8498 0.0078125 6.62695L0 6.30273C0 2.82184 2.82184 0 6.30273 0L6.62695 0.0078125ZM6.30273 1C3.37412 1 1 3.37412 1 6.30273C1.00001 9.23134 3.37413 11.6055 6.30273 11.6055C9.23133 11.6055 11.6055 9.23133 11.6055 6.30273C11.6055 3.37413 9.23134 1.00001 6.30273 1Z"  class="fill-red-700 dark:fill-bright-200"/>
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
                <svg width="20" class="w-7 h-5" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path  class="stroke-red-700 dark:stroke-bright-200" d="M4.99902 11.0883H14.0576C16.5429 11.0883 18.5576 13.103 18.5576 15.5883V16.0004C18.5574 16.8286 17.8859 17.5004 17.0576 17.5004H1.99902C1.17071 17.5004 0.499209 16.8286 0.499023 16.0004V15.5883C0.499025 13.103 2.51374 11.0883 4.99902 11.0883Z"/>
                    <circle class="stroke-red-700 dark:stroke-bright-200" cx="9.52924" cy="4.23529" r="3.73529"/>
                </svg>

            </a>
            <a @click="wishlist = true" class="relative w-fit md:hidden group-hover/buttons:opacity-50 hover:!opacity-100 transition" wire:navigate>
                <span id="wishlist-badge"
                      class="aspect-square rounded-full bg-red-700 absolute -top-2 -right-2 text-white text-xs flex items-center justify-center w-5 h-5 hidden">5</span>
                <svg class="w-7 h-5" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 3.04685V17.9746C1 18.8854 2.00969 19.3429 2.60031 18.6981L8.5 12.2577L14.3997 18.6981C14.9903 19.3429 16 18.8864 16 17.9746V3.04685C16 2.504 15.8025 1.98337 15.4508 1.59951C15.0992 1.21565 14.6223 1 14.125 1H2.875C2.37772 1 1.90081 1.21565 1.54917 1.59951C1.19754 1.98337 1 2.504 1 3.04685Z" class="stroke-red-700 dark:stroke-bright-200" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </a>
            <a @click="cart = true" class="relative w-fit group-hover/buttons:opacity-50 hover:!opacity-100 transition" wire:navigate>
                    <span id="basket-badge"
                          class="aspect-square rounded-full bg-red-700 absolute -top-2 -right-2 text-white text-xs flex items-center justify-center w-5 h-5 hidden">5</span>
                <svg class="w-7 h-5" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="stroke-red-700 dark:stroke-bright-200" d="M4.4541 4.73535H12.4854C13.1975 4.73538 13.8119 5.23603 13.9551 5.93359L15.958 15.6982C16.1488 16.6285 15.4379 17.5 14.4883 17.5H2.45117C1.50159 17.5 0.790632 16.6285 0.981445 15.6982L2.98438 5.93359C3.12761 5.23603 3.74196 4.73535 4.4541 4.73535Z" stroke="#240309"/>
                    <path class="stroke-red-700 dark:stroke-bright-200" d="M9.85083 0.0107422C10.8592 0.113268 11.6458 0.964545 11.6458 2V8.4707H10.6458V2C10.6458 1.44772 10.198 1 9.64575 1H7.29321C6.74093 1 6.29321 1.44771 6.29321 2V8.4707H5.29321V2C5.29321 0.96435 6.08044 0.113005 7.08911 0.0107422L7.29321 0H9.64575L9.85083 0.0107422Z" fill="#240309"/>
                </svg>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                updateBasketCount()
                updateBasketButtons()
                updateWishlistCount()
            }, 1)
        })
    </script>

</header>
