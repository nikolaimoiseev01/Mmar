<button {{$attributes->merge(['class' => 'w-full block py-3 bg-red-700 dark:bg-bright-200 dark:text-red-700 hover:bg-red-100 transition hover:text-red-700 text-center rounded text-white px-8'])}}>
    <span wire:loading.remove>{{$slot}}</span>
    <x-ui.spinner class="w-5 h-5"/>
</button>
