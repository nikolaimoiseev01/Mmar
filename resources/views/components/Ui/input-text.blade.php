@props([
    'type' => 'text',
    'name' => '',
    'placeholder' => '',
    'value' => '',
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'w-full border border-gray-300 bg-bright-200 dark:text-red-700 rounded p-3'
    ]) }}
/>
