@props([
    'from' => 'left',   // С какой стороны выезжает
    'name' => 'drawer', // Имя состояния Alpine
    'mobile_menu' => 'false'
])

@php
    // Позиционирование
    $positionClasses = match ($from) {
        'right' => 'right-0',
        'top' => 'top-0 left-0 w-full max-h-screen',
        'bottom' => 'bottom-0 left-0 w-full max-h-screen',
        default => 'left-0',
    };

    // Анимация
    $enterStart = match ($from) {
        'right' => 'translate-x-full',
        'top' => '-translate-y-full',
        'bottom' => 'translate-y-full',
        default => '-translate-x-full',
    };

    $enterEnd = 'translate-x-0 translate-y-0';
@endphp

<div >
    <!-- Затемнённый фон -->
    <div
        x-show="{{ $name }}"
        x-transition.opacity.duration.300ms
        @click="{{ $name }} = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 sm:hidden"
    ></div>

    <!-- Выезжающая панель -->
    <div
        x-show="{{ $name }}"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="{{ $enterStart }}"
        x-transition:enter-end="{{ $enterEnd }}"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="{{ $enterEnd }}"
        x-transition:leave-end="{{ $enterStart }}"
        {{$attributes ->merge(['class' => "fixed $positionClasses top-0 sm:top-[auto] sm:h-[calc(100vh-53px)]  sm:bottom-0 h-screen w-full max-w-md bg-bright-200 dark:bg-red-500 z-50 p-6 sm:p-3 overflow-auto md:max-w-full md:pt-16 sm:!pt-4"])}}
    >
        <x-heroicon-o-x-mark
            @click="{{ $name }} = false"

            @class([
                'w-8 top-4 right-4 absolute cursor-pointer',
                'hidden' => $mobile_menu === 'true',
            ])/>
        {{ $slot }}
    </div>
</div>
