<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
      darkMode: localStorage.getItem('darkMode')
      || localStorage.setItem('darkMode', 'system')}"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MMAR | @yield('title')</title>

    <link rel="icon" type="image/png" href="/fixed/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/fixed/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/fixed/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/fixed/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/fixed/favicon/site.webmanifest" />

    <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.6/dist/lenis.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        window.APP_ENV = "{{ env('APP_ENV') }}"
    </script>

</head>
<body class="antialiased flex flex-col min-h-screen overflow-x-hidden" x-data="currencySwitcher()">
<x-preloader />
{{--<div id="cursor" class="fixed top-0 left-0 w-5 h-5 rounded-full bg-transparent border-2 border-red-700 dark:border-red-300 pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2"></div>--}}
<x-header.header/>
{{ $slot }}
<x-footer/>
@stack('page-js')
<script>
    window.YGC_WIDGET_ID = "a03168c3-0e63-46a4-b3ca-4e200e8eaa87";
    (function() {
        var script = document.createElement('script');
        script.src = "https://widget.yourgpt.ai/script.js";
        script.id = 'yourgpt-chatbot';
        document.body.appendChild(script);
    })();
</script>
</body>
</html>
