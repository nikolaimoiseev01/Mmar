<section id="shipping_addresses" x-data="{ editingId: null, addingNew: false }" class="space-y-8 border-b border-red-100 pb-16">
    <div class="flex justify-between items-center">
        <h3 class="text-base uppercase text-red-300">Shipping Addresses</h3>

        <template x-if="!addingNew && !editingId">
            <button type="button"
                    class="flex items-center space-x-1 font-bold"
                    @click="addingNew = true; $wire.addNewAddress()">
                <span>Add new address</span>
                <span>&gt;</span>
            </button>
        </template>
    </div>

    <!-- Форма добавления -->
    <div x-show="addingNew" x-cloak class="border p-4 pl-0 rounded-md">
        <form wire:submit.prevent="saveAddress" class="grid grid-cols-2 md:grid-cols-1 gap-6">
            @include('components.address-form-fields')

            <div class="col-span-2 flex gap-4">
                <x-ui.button class="!w-fit">{{ __('Save') }}</x-ui.button>
                <button type="button" @click="addingNew = false" class="text-sm underline">Cancel</button>
            </div>
        </form>
    </div>

    @foreach($userAddresses as $address)
        <div class="space-y-4 border p-4 pl-0 rounded-md" x-data="{ id: {{ $address->id }} }">
            <!-- Просмотр -->
            <div x-show="editingId !== id" class="flex justify-between md:flex-col">
                <div>
                    <p class="text-xs font-semibold text-red-300 dark:text-bright-100 mb-1">
                        {{ $address->name }}
                    </p>
                    <p>{{ $address->address }}, {{ $address->apartment }}, {{ $address->postal_code }} {{ $address->city }}, {{ $address->country }}</p>
                </div>
                <div class="flex items-center gap-4 font-bold">
                    <button type="button"
                            class="flex items-center space-x-1 font-bold"
                            @click="editingId = id; addingNew = false; $wire.editAddress(id)">
                        <span>Edit</span>
                        <span>&gt;</span>
                    </button>
                    <button type="button"
                            class="flex items-center space-x-1 font-bold"
                            @click="if (confirm('Are you sure you want to delete this address?')) { $wire.deleteAddress(id) }">
                        <span>Delete</span>
                        <span>&gt;</span>
                    </button>
                </div>
            </div>

            <!-- Редактирование -->
            <form x-show="editingId === id" x-cloak wire:submit.prevent="saveAddress" class="grid grid-cols-2 md:grid-cols-1 gap-6">
                <input type="hidden" wire:model.defer="edit_id">
                @include('components.address-form-fields')

                <div class="col-span-2 flex gap-4">
                    <x-ui.button class="!w-fit">{{ __('Save') }}</x-ui.button>
                    <button type="button" @click="editingId = null" class="text-sm underline">Cancel</button>
                </div>
            </form>
        </div>
    @endforeach
</section>
