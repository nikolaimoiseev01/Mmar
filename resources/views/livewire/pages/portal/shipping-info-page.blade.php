<main class="flex-1 content flex flex-col gap-8 max-w-5xl">
    @section('title')
        Shipping Information
    @endsection
    <h1 class="mt-12 text-start">Shipping Information</h1>
    <p>At MMAR, we're dedicated to ensuring your orders reach you safely and on time. Our approach to shipping also
        helps reduce our environmental impact. Shipping costs and timing are calculated at checkout, as each shipment is
        usually managed directly by our trusted brand partners. This ensures that your order is handled with care and
        efficiency, while also reducing emissions, energy usage, and waste by eliminating the need for additional
        logistics operations. We encourage you to explore our various shipping options that are tailored to your needs,
        while we strive to be environmentally responsible. Should you have any questions or issues with your delivery,
        our customer service team is always here to help.</p>
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
</main>
