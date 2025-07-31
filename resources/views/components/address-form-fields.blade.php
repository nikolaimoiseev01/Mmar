<div>
    <x-ui.input-label for="name" value="Name" />
    <x-ui.input-text placeholder="Name" wire:model.defer="name" id="name" type="text" class="mt-1 block w-full" required />
</div>

<div>
    <x-ui.input-label for="country" value="Country/Region" />
    <x-ui.input-text placeholder="Country" wire:model.defer="country" id="country" type="text" class="mt-1 block w-full" required />
</div>

<div>
    <x-ui.input-label for="address" value="Address" />
    <x-ui.input-text placeholder="Address" wire:model.defer="address" id="address" type="text" class="mt-1 block w-full" required />
</div>

<div>
    <x-ui.input-label for="apartment" value="Apartment, suite, etc." />
    <x-ui.input-text placeholder="Apartment" wire:model.defer="apartment" id="apartment" type="text" class="mt-1 block w-full" />
</div>

<div>
    <x-ui.input-label for="postal_code" value="Postal code" />
    <x-ui.input-text placeholder="Postal" wire:model.defer="postal_code" id="postal_code" type="text" class="mt-1 block w-full" required />
</div>

<div>
    <x-ui.input-label for="city" value="City" />
    <x-ui.input-text placeholder="City" wire:model.defer="city" id="city" type="text" class="mt-1 block w-full" required />
</div>
