@component('layouts.portal')
    @livewireScripts
    @section('title')
        Oops, This Page Didn’t Sustain
    @endsection
    <section class="flex flex-col items-center justify-center mt-9 gap-2 mb-20 sm:mb-10 content">
        <h2 class="mx-auto text-center">Oops, This Page Didn’t Sustain</h2>
        <p class=" text-center">Unlike our timeless designs, this link didn’t last. Let’s take you somewhere better.</p>
    </section>
    <section>
        @php
            $links = [
                [
                   'link' => route('portal.shop'),
                   'text' => 'Shop',
                   'img' => '/fixed/error-shop.png'
                ],
                [
                   'link' => route('portal.about'),
                   'text' => 'Out story',
                   'img' => '/fixed/error-story.png'
                ],
                [
                   'link' => route('portal.sustainability'),
                   'text' => 'Sustainability',
                   'img' => '/fixed/error-sus.png'
                ],
                [
                   'link' => route('portal.sustainability'),
                   'text' => 'Journal',
                   'img' => '/fixed/error-journal.png'
                ]
            ]
        @endphp
        <div class="grid grid-cols-4 md:grid-cols-2 gap-4 content">
            @foreach($links as $link)
                <div class="col-span-1 flex flex-col gap-2">
                    <a wire:navigate href="{{$link['link']}}"><img src="{{$link['img']}}" class="w-full" alt=""></a>
                    <x-ui.link-arrow
                        href="{{$link['link']}}"
                        text="{{$link['text']}}"
                        textSize="text-lg"
                        class="font-bold"
                        iconSize="h-4 w-4"
                    />
                </div>
            @endforeach
        </div>
    </section>
@endcomponent
