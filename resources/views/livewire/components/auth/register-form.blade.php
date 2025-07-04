<!-- Register Form -->
<form wire:submit="register" class="space-y-4">
    <x-ui.input-text wire:model="first_name" name="first_name" placeholder="First name" />
    <x-ui.input-error :messages="$errors->get('first_name')" class="mt-2"/>

    <x-ui.input-text wire:model="last_name" name="last_name" placeholder="Last name" />
    <x-ui.input-error :messages="$errors->get('last_name')" class="mt-2"/>

    <x-ui.input-text wire:model="age" type="number" name="age"  placeholder="Age" />
    <x-ui.input-error :messages="$errors->get('age')" class="mt-2"/>

    <x-ui.input-text wire:model="email" type="email" name="email" placeholder="Email" />
    <x-ui.input-error :messages="$errors->get('email')" class="mt-2"/>

    <x-ui.input-text wire:model="telephone" name="phone" placeholder="Phone" />
    <x-ui.input-error :messages="$errors->get('phone')" class="mt-2"/>

    <x-ui.input-text wire:model="password" type="password" name="password" placeholder="Password" />
    <x-ui.input-error :messages="$errors->get('password')" class="mt-2"/>

    <x-ui.input-text wire:model="password_confirmation" type="password" name="password_confirmation" placeholder="Password confirmation" />
    <x-ui.input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>


    <label class="flex items-center space-x-2 text-sm">
        <input type="checkbox" class="accent-black">
        <span>Remember me</span>
    </label>
    <label class="flex items-center space-x-2 text-sm">
        <input type="checkbox" class="accent-black">
        <span>Email me news and offers</span>
    </label>

    <x-ui.button type="submit">
        REGISTER
    </x-ui.button>

    <p class="text-xs text-gray-600">
        By clicking Register Now, you agree to our
        <a href="#" class="underline">Privacy Policy</a> and <a href="#" class="underline">Terms</a>.
    </p>
</form>
