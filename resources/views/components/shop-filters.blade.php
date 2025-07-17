@props([
    'hasAnyFilter' => ''
])
<x-sidebar name="shopFilters">
    <div class="flex justify-between mt-20 mb-10 items-end">
        <h2 class="text-5xl">Filter</h2>
        @if($hasAnyFilter)
            <a wire:click="clearAllFilters()">Clear All</a>
        @endif
    </div>

    <div class="flex flex-col gap-6">
        @foreach($filters as $filter)
            <div>
                <div x-data="{ open: false }">
                    <div class="flex gap-2 cursor-pointer" @click="open = !open">
                        <p class="">{{$filter['label']}}</p>
                        <x-heroicon-o-plus x-show="!open" class="w-6"/>
                        <x-heroicon-o-minus x-show="open" class="w-6"/>
                    </div>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-screen"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 max-h-screen"
                         x-transition:leave-end="opacity-0 max-h-0"
                         class="overflow-hidden flex flex-col gap-2 mt-2">
                        @foreach($filter['options'] as $option)
                            <label class="block cursor-pointer">
                                <input type="checkbox" value="{{$option['value']}}" id="{{$option['value']}}"
                                       wire:model.live="{{$filter['model']}}" class="mr-2"> {{$option['label']}}
                            </label>
                            @if($option['suboptions'] ?? null)
                                <div class="flex flex-col pl-6 gap-1">
                                    @foreach($option['suboptions'] as $option)
                                        <label class="block cursor-pointer">
                                            <input type="checkbox" value="{{$option['value']}}"
                                                   id="{{$option['value']}}"
                                                   wire:model.live="{{$filter['submodel']}}"
                                                   class="mr-2"> {{$option['label']}}
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-sidebar>
