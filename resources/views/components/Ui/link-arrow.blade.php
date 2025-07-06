@props([
    'href' => '#',
    'text' => '',
    'textSize' => 'text-lg', // класс для размера шрифта
    'iconSize' => 'h-4 w-4', // класс для размера SVG
])

<a wire:navigate href="{{ $href }}" {{ $attributes->merge(['class' => "group inline-flex hover:underline items-center $textSize font-[Forum] text-2xl"]) }}>
    {{ $text }}
    <svg
        class="ml-2 {{ $iconSize }} transition-transform duration-300 group-hover:translate-x-1"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24"
    >
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
    </svg>
</a>
