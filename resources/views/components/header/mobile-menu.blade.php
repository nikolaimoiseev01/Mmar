<x-sidebar mobile_menu="true" name="mobileMenu">
    <div class="flex flex-col">
        <div class="flex gap-4 justify-between sm:mb-6">
            <x-header.currency-selection/>
            <x-header.mode-toggle/>
        </div>
        <div>
            <input type="text" class="outline-none border-0 pl-0 mb-4 !border-b border-red-100 w-full bg-transparent" placeholder="Search">
        </div>
        <div class="flex flex-col">
            <div x-data="{ open: false }" class="py-4 border-b border-red-100 py-10">
                <!-- Вопрос -->
                <button
                    @click="open = !open"
                    class="flex w-full justify-between items-center text-left hover:text-purple-700 transition"
                >
                    <span class="text-lg font-medium">Shop</span>
                    <span class="text-3xl transition-transform duration-300" :class="open ? 'rotate-45' : ''">+</span>
                </button>

                <!-- Ответ -->
                <div
                    x-show="open"
                    x-collapse
                    class="mt-8 text-gray-600"
                >
                    <x-header.categories/>
                </div>
            </div>
            <div x-data="{ open: false }" class="py-4 border-b border-red-100 py-10">
                <!-- Вопрос -->
                <button
                    @click="open = !open"
                    class="flex w-full justify-between items-center text-left hover:text-purple-700 transition"
                >
                    <span class="text-lg font-medium">Designers</span>
                    <span class="text-3xl transition-transform duration-300" :class="open ? 'rotate-45' : ''">+</span>
                </button>

                <!-- Ответ -->
                <div
                    x-show="open"
                    x-collapse
                    class="mt-2 text-gray-600"
                >
                   Designers
                </div>
            </div>
            <div x-data="{ open: false }" class="py-4 border-b border-red-100 py-10">
                <!-- Вопрос -->
                <button
                    @click="open = !open"
                    class="flex w-full justify-between items-center text-left hover:text-purple-700 transition"
                >
                    <span class="text-lg font-medium">About</span>
                    <span class="text-3xl transition-transform duration-300" :class="open ? 'rotate-45' : ''">+</span>
                </button>

                <!-- Ответ -->
                <div
                    x-show="open"
                    x-collapse
                    class="mt-2 flex flex-col gap-4 text-gray-600"
                >
                    <a href="{{route('portal.sustainability')}}">Sustainability</a>
                    <a href="{{route('portal.about')}}">Our Story</a>
                    <a href="{{route('portal.sustainability')}}">Journal</a>
                </div>
            </div>
            <a href="" class="mt-4 text-lg font-medium">Wishlist</a>
        </div>
    </div>
</x-sidebar>
