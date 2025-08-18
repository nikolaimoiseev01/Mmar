<x-ui.modal class="z-[9999]" name="auth-modal" :show="false" maxWidth="md">
    <div x-data="{ tab: 'register' }" class="relative p-8 space-y-6">

        <!-- Кнопка закрытия -->
        <button
            class="absolute top-4 right-4 text-4xl"
            onclick="window.dispatchEvent(new CustomEvent('close-modal', { detail: 'auth-modal' }))">
            &times;
        </button>

        <!-- Header + Switch link -->
        <div class="flex justify-between items-start">
            <h2 class="text-4xl" x-text="tab === 'signin' ? 'Sign In' : 'Register'"></h2>
        </div>

        <div class="flex justify-between items-center !text-sm sm:!text-xs">
            <template x-if="tab === 'signin'">
                <p class="sm:!text-base">Don’t have an account yet?
                    <button class="font-semibold underline" @click="tab = 'register'">Register &gt;</button>
                </p>
            </template>
            <template x-if="tab === 'register'">
                <p class="sm:!text-base">Already have an account?
                    <button class="font-semibold underline" @click="tab = 'signin'">Sign in &gt;</button>
                </p>
            </template>
        </div>

        <!-- Description -->
        <p class="text-sm text-gray-600">
            <span x-show="tab === 'signin'">Sign in to check your orders and save your information</span>
            <span x-show="tab === 'register'">Create an account to check your orders and save your information</span>
        </p>

        <div data-lenis-prevent class=""  x-show="tab === 'signin'">
            <livewire:components.auth.login-form/>
        </div>

        <div data-lenis-prevent class=""  x-show="tab === 'register'">
            <livewire:components.auth.register-form/>
        </div>

    </div>

</x-ui.modal>
