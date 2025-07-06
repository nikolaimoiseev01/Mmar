<main class="flex-1">
    <div class="content mt-10 flex flex-col gap-16">
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
        <div class="space-y-4">
            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                <h3 class="text-base uppercase text-red-300">
                    Shipping Addresses
                </h3>
                <a href="#" class="text-sm font-medium text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
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
                <div class="flex items-center gap-4">
                    <a href="#" class="text-sm font-medium text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                        Edit <span class="text-xl">&rsaquo;</span>
                    </a>
                    <a href="#" class="text-sm font-medium text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                        Delete <span class="text-xl">&rsaquo;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Order History -->
        <div class="space-y-4 mb-20">
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
                                <img src="/fixed/test/product-1.png" alt="" class="w-16 h-16 object-cover rounded">
                                <span class="absolute top-0 right-0 bg-gray-200 text-xs px-1 rounded-full">1</span>
                            </div>
                            <div class="relative">
                                <img src="/fixed/test/product-2.png" alt="" class="w-16 h-16 object-cover rounded">
                                <span class="absolute top-0 right-0 bg-gray-200 text-xs px-1 rounded-full">1</span>
                            </div>
                            <div class="flex flex-col justify-between">
                                <p class="text-sm">Via del Conservatorio, 63, 00186 Roma RM, Italy</p>
                                <p class="text-sm font-medium mt-1">Total: €249,00</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-end gap-2 md:flex-row md:justify-between md:w-full">
                        <span class="text-sm text-red-300 dark:text-bright-100">12.01.2025</span>
                        <a href="#" class="text-sm font-medium text-red-700 dark:text-bright-200 hover:underline flex items-center gap-1">
                            Details <span class="text-xl">&rsaquo;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="mb-20">
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
</main>
