<main class="flex-1">
    @section('title')
        Contact Us
    @endsection
    <div class="flex md:flex-col">
        <div class="flex flex-col gap-16 px-6 pt-6 w-1/2 md:w-full md:mb-16">
            <h1 class="text-5xl">Contact Us</h1>
            <div class="flex flex-col gap-4">
                <p class="text-red-100">Reach out to us for any inquiries or support.<br>
                    We're here to help!</p>
                <div class="flex gap-8">
                    <a href="">support@mmar.com</a>
                    <a href="">+1-800-123-4567</a>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-red-100">Follow us on social media to stay updated on the latest trends<br> and join our
                    vibrant community<br>
                    We're here to help!</p>
                <div class="flex gap-8">
                    <a href="">Instagram</a>
                    <a href="">Facebook</a>
                    <a href="">Twitter</a>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-red-100">Press Inquiries<br>
                    We're here to help!</p>
                <p>For media inquiries, please contact our PR team at press@mmar.com.</p>
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-red-100">Subscribe to our newsletter for updates, promotions, and insights into
                    sustainable fashion</p>
                <livewire:components.subscribe-form/>
            </div>
            <div class="flex flex-col gap-14">
                <h1 class="text-5xl">FAQ & Helpful Links</h1>
                <div class="flex flex-col gap-4">
                    @foreach($links as $link)
                        <a href="{{$link['link']}}" wire:navigate class="group py-4 text-xl flex justify-between border-b border-red-100 items-center">
                            <span>{{$link['title']}}</span>
                            <svg width="16" class="transition group-hover:rotate-45" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.717366 15.1264L14.1523 1.69187M14.1523 1.69187L0.717309 1.69187M14.1523 1.69187L14.1523 15.1269"
                                    class="stroke-red-700 dark:stroke-bright-200" stroke-width="2"/>
                            </svg>

                        </a>
                    @endforeach

                </div>
            </div>
        </div>
        <img src="/fixed/contact-1.png" class="w-1/2 md:w-full" alt="">
    </div>
</main>
