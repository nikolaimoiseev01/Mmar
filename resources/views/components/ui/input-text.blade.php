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
        'class' => 'w-full border border-red-100 bg-transparent dark:text-red-700 rounded-xl p-3'
    ]) }}
/>
