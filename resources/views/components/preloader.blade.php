<div
    x-data="{ loading: sessionStorage.getItem('preloaderShown') ? false : true }"
    x-init="
        if (!sessionStorage.getItem('preloaderShown')) {
            window.addEventListener('load', () => {
                loading = false;
                sessionStorage.setItem('preloaderShown', 'true');
            });
        }
    "
    x-show="loading"
    x-transition.opacity.duration.700ms
    class="fixed inset-0 z-[999999999] flex items-center justify-center bg-bright-200"
>
    <img src="/fixed/logo.png"
         class="w-40 animate-logo-pulse"
         alt="logo">
</div>
