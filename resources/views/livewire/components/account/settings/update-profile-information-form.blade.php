<section id="personal_information" x-data="{ editing: false, changingPassword: false }" class="space-y-14 pb-16 border-b border-red-100">

    <!-- Заголовок и экшены -->
    <div class="flex justify-between items-start gap-4 md:flex-col">
        <h3 class="text-base uppercase text-red-300">
            PERSONAL INFORMATION
        </h3>

        <div class="flex items-center space-x-4 font-bold">
            <button type="button"
                    class="flex items-center space-x-1"
                    @click="editing = !editing; changingPassword = false">
                <span x-text="editing ? 'Cancel' : 'Edit'"></span>
                <span>&gt;</span>
            </button>

            <button type="button"
                    class="flex items-center space-x-1"
                    @click="changingPassword = !changingPassword; editing = false">
                <span x-text="changingPassword ? 'Cancel' : 'Change password'"></span>
                <span>&gt;</span>
            </button>
        </div>
    </div>

    <!-- Просмотр (если не редактируем и не меняем пароль) -->
    <div x-show="!editing && !changingPassword" x-cloak class="flex justify-between gap-6 flex-wrap">
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">First name</p>
            <p class="text-base font-medium">{{ Auth()->user()->first_name }}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Last name</p>
            <p class="text-base font-medium">{{ Auth()->user()->last_name }}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Age</p>
            <p class="text-base font-medium">{{ Auth()->user()->age }}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Phone number</p>
            <p class="text-base font-medium">{{ Auth()->user()->telephone }}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Email</p>
            <p class="text-base font-medium">{{ Auth()->user()->email }}</p>
        </div>
    </div>

    <!-- Редактирование профиля -->
    <form
        wire:submit.prevent="updateProfileInformation"
        x-show="editing"
        x-cloak
        class="grid grid-cols-2 md:grid-cols-1 gap-6">

        <div class="md:col-span-2">
            <x-ui.input-label for="first_name" value="First name" />
            <x-ui.input-text wire:model.defer="first_name"
                             id="first_name" name="first_name" type="text"
                             class="mt-1 block w-full" required autocomplete="given-name" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div class="md:col-span-2">
            <x-ui.input-label for="last_name" value="Last name" />
            <x-ui.input-text wire:model.defer="last_name"
                             id="last_name" name="last_name" type="text"
                             class="mt-1 block w-full" required autocomplete="family-name" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div class="md:col-span-2">
            <x-ui.input-label for="age" value="Age" />
            <x-ui.input-text wire:model.defer="age"
                             id="age" name="age" type="number"
                             class="mt-1 block w-full" required />
            <x-ui.input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <div class="md:col-span-2">
            <x-ui.input-label for="telephone" value="Telephone number" />
            <x-ui.input-text wire:model.defer="telephone"
                             id="telephone" name="telephone" type="text"
                             class="mt-1 block w-full" required autocomplete="tel" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>

        <div class="col-span-2">
            <x-ui.input-label for="email" value="Email" />
            <x-ui.input-text wire:model.defer="email"
                             id="email" name="email" type="email"
                             class="mt-1 block w-full" required autocomplete="email" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="col-span-2">
            <x-ui.button class="!w-fit sm:!w-full">{{ __('Save') }}</x-ui.button>
        </div>
    </form>

    <!-- Смена пароля -->
    <form
        wire:submit.prevent="changePassword"
        x-show="changingPassword"
        x-cloak
        class="grid grid-cols-2 md:grid-cols-1 gap-6">

        <div class="md:col-span-2">
            <x-ui.input-label for="current_password" value="Current password" />
            <x-ui.input-text wire:model.defer="current_password" placeholder="Current password"
                             id="current_password" name="current_password" type="password"
                             class="mt-1 block w-full" required autocomplete="current-password" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('current_password')" />
        </div>

        <div class="md:col-span-2">
            <x-ui.input-label for="new_password" value="New password" />
            <x-ui.input-text wire:model.defer="new_password"
                             id="new_password" name="new_password" type="password" placeholder="New password"
                             class="mt-1 block w-full" required autocomplete="new-password" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('new_password')" />
        </div>

        <div class="md:col-span-2">
            <x-ui.input-label for="new_password_confirmation" value="Confirm new password" />
            <x-ui.input-text wire:model.defer="new_password_confirmation" placeholder="Confirm new password"
                             id="new_password_confirmation" name="new_password_confirmation" type="password"
                             class="mt-1 block w-full" required autocomplete="new-password" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('new_password_confirmation')" />
        </div>

        <div class="col-span-2">
            <x-ui.button class="!w-fit sm:!w-full">{{ __('Change Password') }}</x-ui.button>
        </div>
    </form>

</section>
