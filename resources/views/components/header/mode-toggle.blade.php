<!-- Вставь этот скрипт в <head>, чтобы тема не мигала -->
{{--<script>--}}
{{--    if (--}}
{{--        localStorage.getItem('theme') === 'dark' ||--}}
{{--        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)--}}
{{--    ) {--}}
{{--        document.documentElement.classList.add('dark')--}}
{{--    } else {--}}
{{--        document.documentElement.classList.remove('dark')--}}
{{--    }--}}
{{--</script>--}}

<!-- Сам тогл -->
<div x-data="{
        darkMode: false,
        init() {
            this.darkMode = localStorage.getItem('theme')
                ? localStorage.getItem('theme') === 'dark'
                : window.matchMedia('(prefers-color-scheme: dark)').matches

            document.documentElement.classList.toggle('dark', this.darkMode)
        },
        toggleTheme() {
            this.darkMode = !this.darkMode
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light')
            document.documentElement.classList.toggle('dark', this.darkMode)
        }
    }"
     x-init="init()"
     class="flex items-center gap-2"
>
    <!-- Light label -->
    <span class="text-sm font-medium">Light</span>

    <!-- Switch -->
    <button @click="toggleTheme()"
            class="relative inline-flex h-6 w-12 sm:w-16 sm:h-7 items-center rounded-full transition-colors duration-300"
            :class="darkMode ? 'bg-gray-400' : 'bg-gray-300'">
        <span class="sr-only">Toggle theme</span>
        <span class="inline-block h-4 w-4 transform rounded-full bg-gray-900 transition-transform duration-300"
              :class="darkMode ? 'translate-x-7 sm:translate-x-10' : 'translate-x-1'"></span>
    </button>

    <!-- Dark label -->
    <span class="text-sm font-medium">Dark</span>
</div>
