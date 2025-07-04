<div
    x-data="{ step: @entangle('step') }"
    class="flex flex-col items-center justify-center bg-cover bg-center w-[448px]"
>
    <div class="w-full max-w-md flex items-center justify-between py-3 relative h-[66px]">

        {{-- Шаг 1: Email --}}
        <div
            x-show="step === 1"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-10"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-10"
            class="w-full flex items-center justify-between absolute left-0 top-0 py-3"
        >
            <input wire:model.defer="email" type="email" placeholder="Email" class="bg-transparent flex-1 outline-none">
            <button wire:click="nextStep" class="bg-black text-white h-[42px] w-[42px] text-xl">
                →
            </button>
        </div>

        {{-- Шаг 2: Name --}}
        <div
            x-show="step === 2"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-10"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-10"
            class="w-full flex items-center justify-between absolute left-0 top-0 py-3"
        >
            <input wire:model.defer="name" type="text" placeholder="Your Name" class="bg-transparent flex-1 outline-none">
            <button wire:click="nextStep" class="bg-black text-white h-[42px] w-[42px] text-xl">
                →
            </button>
        </div>

        {{-- Шаг 3: Date of Birth --}}
        <div
            x-show="step === 3"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-10"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-10"
            class="w-full flex items-center justify-between absolute left-0 top-0 py-3"
        >
            <input wire:model.defer="dob" type="date" class="bg-transparent flex-1 outline-none">
            <button wire:click="nextStep" class="bg-black text-white h-[42px] w-[42px] text-xl">
                →
            </button>
        </div>

        {{-- Шаг 4: Успех --}}
        <div
            x-show="step === 4"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-10"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-10"
            class="w-full flex items-center justify-center absolute left-0 top-0 py-3 text-green-600 font-semibold"
        >
            {{ session('message') }}
        </div>

    </div>

    {{-- Ошибки --}}
    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    @error('dob') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

</div>
