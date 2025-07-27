<main class="flex-1 content flex flex-col gap-8 max-w-5xl">
    @section('title')
        Size Guide
    @endsection
    <h1 class="smooth-content mt-12 text-start">How to Find the Right Fit</h1>
    <p class="smooth-content">At MMAR, we understand the importance of finding the right fit. Each of our trusted brand
        partners offers their
        own size guide to help you make the best choice. This tailored approach ensures that you have accurate
        information specific to the brand, allowing for a better fit and greater satisfaction with your purchase. By
        referring to the individual size guides, you can find the perfect size without the guesswork, leading to fewer
        returns and a more sustainable shopping experience.
        <br><br>
        For any questions or if you need assistance with sizing, our customer service team is always here to help to
        ensure a perfect fit for your needs.</p>
    <div class="smooth-content flex flex-col gap-4 mb-4 mt-2">
        <x-ui.link-arrow
            href="{{route('portal.contact')}}"
            text="Contact us"
            textSize="text-lg"
            class="font-bold"
            iconSize="h-4 w-4"
        />
        <x-ui.link-arrow
            href=""
            text="Chat with AI assistant"
            textSize="text-lg"
            class="font-bold"
            iconSize="h-4 w-4"
        />
    </div>

    <p class="smooth-content">Your comfort and satisfaction are our top priorities.</p>
</main>
