<main class="flex-1">
    @section('title')
        Account
    @endsection
        <div class="container mx-auto flex md:flex-col max-w-7xl px-6 sm:px-0 py-10 gap-8"
             x-data="tocHandler">

            <!-- Table of Contents -->
            <aside class="w-1/3 md:w-full">
                <div class="sticky top-20 p-4">
                    <nav class="flex flex-col md:flex-row flex-wrap gap-2">
                        @foreach($contents as $content)
                            <a href="#{{$content['id']}}"
                               :class="active === '{{$content['id']}}' ? 'bg-red-300 text-bright-200' : 'text-red-300'"
                               class="w-fit min-w-max rounded-3xl py-2 px-4 border border-red-300 transition hover:bg-red-300 hover:text-bright-200">
                                {{$content['title']}}
                            </a>
                        @endforeach
                    </nav>
                </div>
            </aside>

            <!-- Main Article -->
            <div class="content mt-10 md:mt-0 flex flex-col gap-16">
                <div class="flex justify-between">
                    <h1 class="text-5xl">Welcome back, {{Auth::user()->first_name}}!</h1>
                    <x-ui.link-arrow
                        wire:click="logout()"
                        text="Logout"
                        textSize="text-base"
                        iconSize="h-4 w-4"
                    />
                </div>
                <livewire:components.account.settings.update-profile-information-form/>

                <!-- Shipping Addresses -->
                <section id="shipping_addresses" class="space-y-14">
                    <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                        <h3 class="text-base uppercase text-red-300">
                            Shipping Addresses
                        </h3>
                        <a href="#" class="font-bold text-sm text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                            Add new address
                            <span class="text-xl">&rsaquo;</span>
                        </a>
                    </div>

                    <!-- Primary address -->
                    <div class="flex justify-between items-start md:flex-col">
                        <div>
                            <p class="text-xs font-semibold text-red-300 dark:text-bright-100 mb-1">Primary address</p>
                            <p>Via del Conservatorio, 63, 00186 Roma RM, Italy</p>
                        </div>
                        <div class="flex items-center gap-4 font-bold">
                            <a href="#" class="text-sm text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                                Edit <span class="text-xl">&rsaquo;</span>
                            </a>
                            <a href="#" class="text-sm text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                                Delete <span class="text-xl">&rsaquo;</span>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Order History -->
                <section id="order_history" class="space-y-14 mb-20">
                    <h3 class="text-base uppercase text-red-300">
                        Order History
                    </h3>
                    <!-- Order block -->
                    <div class="space-y-8">
                        <!-- Order 56 -->
                        <div class="flex justify-between items-start md:flex-col gap-4">
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-sm font-medium">
                                    <span>Order №56</span>
                                    <span class="text-gray-400">•</span>
                                    <span class="text-red-300 dark:text-bright-100">Processing</span>
                                </div>
                                <div class="flex gap-2">
                                    <div class="relative">
                                        <img src="/fixed/test/product-1.png" alt="" class="w-32 aspect-square object-cover rounded">
                                        <span class="absolute top-0 right-0 bg-gray-200 text-xs px-1 rounded-full">1</span>
                                    </div>
                                    <div class="relative">
                                        <img src="/fixed/test/product-2.png" alt="" class="w-32 aspect-square object-cover rounded">
                                        <span class="absolute top-0 right-0 bg-gray-200 text-xs px-1 rounded-full">1</span>
                                    </div>
                                    <div class="flex flex-col justify-between">
                                        <p class="text-sm">Via del Conservatorio, 63, 00186 Roma RM, Italy</p>
                                        <p class="text-sm font-medium sm:text-base mt-1">Total: €249,00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-2 justify-between h-[156px] md:h-auto md:flex-row md:justify-between md:w-full">
                                <span class="text-sm text-red-700 dark:text-bright-100">12.01.2025</span>
                                <a href="{{route('account.order')}}" wire:navigate class="text-sm font-bold text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                                    Details <span class="text-xl">&rsaquo;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="recently_viewed" class="mb-20">
                    <div class="mb-4 flex justify-between content">
                        <h2>Recently viewed</h2>
                        <x-ui.link-arrow
                            href="{{route('portal.shop')}}"
                            text="View All"
                            textSize="text-base"
                            iconSize="h-4 w-4"
                        />
                    </div>
                    <x-three-cards id="index1" :products="$products"/>
                </section>
            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('tocHandler', () => ({
                    active: '',
                    init() {
                        const observer = new IntersectionObserver(
                            (entries) => {
                                entries.forEach((entry) => {
                                    if (entry.isIntersecting) {
                                        this.active = entry.target.id;
                                    }
                                });
                            },
                            {
                                rootMargin: '0px 0px -70% 0px',
                                threshold: 0
                            }
                        );
                        document.querySelectorAll('section').forEach((section) => {
                            observer.observe(section);
                        });
                    }
                }));
            });
        </script>
</main>
