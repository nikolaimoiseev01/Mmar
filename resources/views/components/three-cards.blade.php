<div class="flex gap-4 w-full">
    @foreach($products as $product)
        <x-product-card :product="$product" class="flex-1"/>
    @endforeach
</div>
