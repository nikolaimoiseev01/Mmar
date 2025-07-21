<section id="personal_information"  x-data="{ editing: false }" class="space-y-14 pb-16 border-b border-red-100">

    <!-- Заголовок и экшены -->
    <div class="flex justify-between items-start gap-4 md:flex-col">
        <h3 class="text-base uppercase text-red-300">
            PERSONAL INFORMATION
        </h3>

        <div class="flex items-center space-x-4 text-sm font-bold">
            <button type="button"
                    class="flex items-center space-x-1"
                    @click="editing = !editing">
                <span x-text="editing ? 'Cancel' : 'Edit'"></span>
                <span>&gt;</span>
            </button>
            <a href="#">Change password &gt;</a>
        </div>
    </div>

    <!-- Просмотр -->
    <div x-show="!editing" x-cloak class="flex justify-between gap-6 flex-wrap">
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">First name</p>
            <p class="text-base font-medium">{{Auth()->user()->first_name}}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Last name</p>
            <p class="text-base font-medium">{{Auth()->user()->last_name}}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Age</p>
            <p class="text-base font-medium">{{Auth()->user()->age}}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Phone number</p>
            <p class="text-base font-medium">{{Auth()->user()->telephone}}</p>
        </div>
        <div>
            <p class="text-xs text-red-300 dark:text-bright-100">Email</p>
            <p class="text-base font-medium">{{Auth()->user()->email}}</p>
        </div>
    </div>

    <!-- Редактирование -->
    <form
        wire:submit.prevent="updateProfileInformation"
        x-show="editing"
        x-cloak
        class="grid grid-cols-2 gap-6">

        <div>
            <x-ui.input-label for="first_name" value="First name" />
            <x-ui.input-text wire:model.defer="first_name"
                             id="first_name" name="first_name" type="text"
                             class="mt-1 block w-full" required autocomplete="first_name" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-ui.input-label for="last_name" value="Last name" />
            <x-ui.input-text wire:model.defer="last_name"
                             id="last_name" name="last_name" type="text"
                             class="mt-1 block w-full" required autocomplete="last_name" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-ui.input-label for="age" value="Age" />
            <x-ui.input-text wire:model.defer="age"
                             id="age" name="age" type="number"
                             class="mt-1 block w-full" required autocomplete="age" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <div>
            <x-ui.input-label for="telephone" value="telephone number" />
            <x-ui.input-text wire:model.defer="telephone"
                             id="telephone" name="telephone" type="text"
                             class="mt-1 block w-full" required autocomplete="tel" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>

        <div class="col-span-2">
            <x-ui.input-label for="email" value="Email" />
            <x-ui.input-text wire:model.defer="email"
                             id="email" name="email" type="email"
                             class="mt-1 block w-full" required autocomplete="username" />
            <x-ui.input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="col-span-2">
            <x-ui.button class="!w-fit">{{ __('Save') }}</x-ui.button>
        </div>
    </form>

</section>
