@props([
    'name',         // ID модалки
    'tabs' => [],   // Список табов
    'maxWidth' => '2xl',
])

@php
    $maxWidthClass = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div
    x-data="{
        show: false,
        activeTab: '{{ $tabs[0] ?? 'default' }}',

        open(tab) {
            this.activeTab = tab;
            this.show = true;
            document.body.classList.add('overflow-y-hidden');
        },

        close() {
            this.show = false;
            document.body.classList.remove('overflow-y-hidden');
        }
    }"
    x-init="$watch('show', value => {
        if (value) {
            if (typeof lenis !== 'undefined') lenis.stop();
        } else {
            if (typeof lenis !== 'undefined') lenis.start();
        }
    })"
    x-on:open-modal.window="
        if ($event.detail.name === '{{ $name }}') {
            open($event.detail.tab);
        }
    "
    x-show="show"
    x-on:keydown.escape.window="close()"
    style="display: none"
    class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
>
    <!-- Overlay -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="close()"></div>

    <!-- Modal -->
    <div data-lenis-prevent
        class="relative flex flex-col bg-bright-200 dark:bg-red-500 h-[80vh] rounded-lg shadow-xl transform transition-all sm:w-full max-w-2xl sm:mx-auto z-50 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-5xl">Product Information</h1>
            <button class="text-3xl sm:text-4xl" @click="close()">✕</button>
        </div>

        <!-- Tabs -->
        <div class="flex flex-wrap w-full mb-9 md:flex-wrap">
            @foreach ($tabs as $tab)
                <button
                    @click="activeTab = '{{ $tab }}'"
                    :class="activeTab === '{{ $tab }}' ? 'bg-bright-200 dark:bg-red-700 dark:!text-bright-200' : 'bg-red-100'"
                    class="py-4 flex-1 border md:w-1/2 md:min-w-[50%] dark:text-red-700"
                >
                    {{ strtoupper($tab) }}
                </button>
            @endforeach
        </div>

        <!-- Tab slots -->
        @foreach($contents as $key=>$content)
            <div class="overflow-auto" x-show="activeTab === '{{$key}}'">
                {!! $content !!}
            </div>
        @endforeach
    </div>
</div>
