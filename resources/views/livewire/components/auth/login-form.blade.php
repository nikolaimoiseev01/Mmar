<!-- Sign In Form -->
<form wire:submit="login" class="space-y-4">
    <x-ui.input-text wire:model="form.email" type="email" name="email" placeholder="Email" />
    <x-ui.input-error  :messages="$errors->get('form.email')" class="mt-2"/>

    <x-ui.input-text wire:model="form.password" type="password" name="password" placeholder="Password" />
    <x-ui.input-error :messages="$errors->get('form.password')" class="mt-2"/>

    <label class="flex items-center space-x-2 text-sm">
        <input wire:model="form.remember"
               id="remember"
               name="remember"
               type="checkbox" class="accent-black">
        <span>Remember me</span>
    </label>

    <x-ui.button type="submit">
        SIGN IN
    </x-ui.button>
</form>
