<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Product;
use Livewire\Component;

class CartPage extends Component
{
    public $cart_products;
    public $recent_products;
    public function render()
    {
        $cookie = collect(json_decode(request()->cookie('basket-products')));
        $this->cart_products = Product::whereIn('id', $cookie->pluck('id'))
            ->with('media')
            ->get()
            ->map(function ($product) use ($cookie) {
                $cookie_product = collect($cookie)->firstWhere('id', $product->id);
                $product->count =$cookie_product->count ?? 1;
                $product->count_price =$cookie_product->count * $product->price;
                return $product;
            });
        $this->recent_products = Product::orderBy('created_at', 'desc')
            ->take(3)
            ->with('media')
            ->get();
        return view('livewire.pages.portal.cart-page');
    }
}
