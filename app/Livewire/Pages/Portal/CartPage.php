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
                $product->count = $cookie[$product->id]->count ?? 1;
                return $product;
            });
        $this->recent_products = Product::orderBy('created_at', 'desc')
            ->take(3)
            ->with('media')
            ->get();
        return view('livewire.pages.portal.cart-page');
    }
}
