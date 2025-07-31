<main class="flex-1">
    @section('title')
        Account
    @endsection
    <div class="container mx-auto flex md:flex-col max-w-7xl px-6 sm:px-0 py-10 gap-8">

        <!-- Table of Contents -->
        <aside class="w-1/3 md:w-full">
            <div class="sticky top-20 p-4">
                <nav class="flex flex-col md:flex-row flex-wrap gap-2">
                    @foreach($contents as $content)
                        <a href="#{{$content['id']}}"
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
            <livewire:components.account.settings.shipping-info/>
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
                                    <img src="/fixed/test/product-1_1.png" alt=""
                                         class="w-32 aspect-square object-cover rounded">
                                    <span
                                        class="flex items-center justify-center absolute -top-2 -right-2 bg-red-300 text-bright-200 w-5 h-5 text-xs px-1 rounded-full">1</span>
                                </div>
                                <div class="relative">
                                    <img src="/fixed/test/product-2_1.png" alt=""
                                         class="w-32 aspect-square object-cover rounded">
                                    <span
                                        class="flex items-center justify-center absolute -top-2 -right-2 bg-red-300 text-bright-200 w-5 h-5 text-xs px-1 rounded-full">1</span>
                                </div>
                                <div class="ml-4 flex flex-col justify-between">
                                    <p class="text-sm">Via del Conservatorio, 63, 00186 Roma RM, Italy</p>
                                    <p class="text-sm font-medium sm:text-base mt-1">Total: €249,00</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-end gap-2 justify-between h-[156px] md:h-shiauto md:flex-row md:justify-between md:w-full">
                            <span class="text-sm text-red-700 dark:text-bright-100">12.01.2025</span>
                            <a type="button"
                               href="{{route('account.order')}}" wire:navigate
                               class="flex items-center space-x-1 font-bold"
                               @click="editingId = id; addingNew = false; $wire.editAddress(id)">
                                <span>Details</span>
                                <span>&gt;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

       </div>
    </div>

        <section id="recently_viewed" class="mb-20">
            <div class="mb-4 flex justify-between content">
                <h2>Recently viewed</h2>
            </div>
            <x-three-cards id="index1" :products="$products"/>
        </section>

     <script type="module">
        setTimeout(function () {
            lenis.start();
        }, 100)
    </script>

    <script>
        let tocObserver = null;

        function setupTocObserver() {
            // Удалить старый observer если он был
            if (tocObserver) tocObserver.disconnect();

            const $tocLinks = document.querySelectorAll('aside nav a');

            tocObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const id = entry.target.id;

                        $tocLinks.forEach(link => {
                            const isActive = link.getAttribute('href') === `#${id}`;
                            link.classList.toggle('bg-red-300', isActive);
                            link.classList.toggle('text-bright-200', isActive);
                        });
                    }
                });
            }, {
                rootMargin: '0px 0px -70% 0px',
                threshold: 0
            });

            // Следим за всеми section[id]
            document.querySelectorAll('section[id]').forEach(section => {
                tocObserver.observe(section);
            });
        }

        // При полной загрузке страницы
        window.addEventListener('load', setupTocObserver);

        // После wire:navigate
        document.addEventListener('livewire:navigated', () => {
            setTimeout(setupTocObserver, 100);
        });
    </script>

</main>
