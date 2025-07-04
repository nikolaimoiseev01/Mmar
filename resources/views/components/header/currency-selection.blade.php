<div class="relative inline-block text-left">
    <!-- Триггер -->
    <button @click="open = !open" class="flex items-center gap-1 px-4 py-2 ">
        <span x-text="currency" class="font-medium"></span>
        <svg class="w-4 h-4 transform transition-transform duration-200"
             :class="{ 'rotate-180': open }"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <!-- Выпадающий список -->
    <div x-show="open" @click.away="open = false"
         x-transition
         class="absolute z-10 mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg">
        <ul>
            <template x-for="item in currencies" :key="item">
                <li>
                    <button @click="currency = item; open = false"
                            class="w-full text-left px-4 py-2 hover:bg-gray-100">
                        <span x-text="item"></span>
                    </button>
                </li>
            </template>
        </ul>
    </div>
</div>

<script>
    function currencySwitcher() {
        return {
            open: false,
            currency: 'EUR',
            currencies: ['USD', 'EUR', 'GBP'],
            // Курс относительно EUR
            rates: {
                EUR: 1,
                USD: 1.1,
                GBP: 0.85
            },
            symbols: {
                EUR: '€',
                USD: '$',
                GBP: '£'
            },
            formatPrice(value) {
                const rate = this.rates[this.currency];
                const symbol = this.symbols[this.currency];
                return symbol + (value * rate).toFixed(2);
            }
        }
    }
</script>
