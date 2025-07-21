<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class ProductPage extends Component
{
    public $product;
    public $products;

    public $count = 1;

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
    }

    public function makeToCookie(Request $request)
    {
        $cookie = collect(json_decode($request->cookie('basket-products')));
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
