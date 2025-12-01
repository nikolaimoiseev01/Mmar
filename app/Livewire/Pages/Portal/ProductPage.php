<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class ProductPage extends Component
{
    public $product;
    public $products;

    public $count = 1;
    public $availabilityOptions;

    public function render()
    {
        $this->products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('livewire.pages.portal.product-page');
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)
            ->with('brand')
            ->with('media')
            ->firstOrFail();
        $availabilityOptions = collect($this->product->availability_options)->map(function ($option) {
            $color = ProductColor::find($option['color_id']);

            $option['color_name'] = $color->name ?? null;
            $option['is_simple_color'] = $color->is_simple_color ?? null;
            $option['color'] = $color->color ?? null;
            $option['colorImg'] = $color && !$color->is_simple_color ? $color->getFirstmediaUrl('cover') ?? null : null;

            return $option;
        })->toArray();
        $colors = collect($this->product['availability_options']);
        $this->availabilityOptions = $availabilityOptions;
    }

    public function makeToCookie(Request $request)
    {
        $this->dispatch('addIdToCookie',
            id: $this->product->id, count: $this->count, price: $this->product->price
        );
        $this->sent = true;
    }

    public function makeToWishlist(Request $request)
    {
        $this->dispatch('addIdToWishlist',
            id: $this->product->id, count: $this->count, price: $this->product->price
        );
        $this->sent = true;
    }
}
