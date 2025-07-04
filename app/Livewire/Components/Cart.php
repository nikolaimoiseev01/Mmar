<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    protected $listeners = [
        'updateCartProducts' => 'updateCartProducts',
    ];

    public function render()
    {
        return view('livewire.components.cart');
    }

    public function mount()
    {
        $this->updateCartProducts();
    }

    public function updateCartProducts()
    {
        $cookie = collect(json_decode(request()->cookie('basket-products')));
        $this->products = Product::whereIn('id', $cookie->pluck('id'))
            ->with('media')
            ->get();
    }
}
