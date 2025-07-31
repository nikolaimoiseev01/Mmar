<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    protected $listeners = [
        'updateCartProducts' => 'updateCartProducts',
        'addIdToCookie' => 'addIdToCookie'
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
            ->get()
            ->map(function ($product) use ($cookie) {
                $cookie_product = collect($cookie)->firstWhere('id', $product->id);
                $product->count = $cookie_product->count ?? 1;
                $product->count_price = $cookie_product->count * $product->price;
                return $product;
            });
    }

    public function addIdToCookie(Request $request, $id, $count, $price)
    {
        $cookie = collect(json_decode($request->cookie('basket-products')));

        if (!$cookie->contains('id', $id)) {
            $to_add = [
                'id' => $id,
                'count' => $count,
                'price' => $price
            ];
            $cookie[] = $to_add;
        } else {
            // Удаляем товар по id
            $cookie = $cookie->reject(fn($item) => $item->id == $id)->values();
        }

        // Перезаписываем куку (вне if-else, чтобы избежать дублирования)
        Cookie::queue(
            Cookie::make(
                'basket-products',
                json_encode($cookie),
                60,
                '/',
                null,
                false,
                false
            )
        );

        $this->dispatch('afterBasketUpdate');
        $this->dispatch('updateCartProducts');
    }

    public function increment($id)
    {
        $cookie = collect(json_decode(request()->cookie('basket-products')));

        $cookie = $cookie->map(function ($item) use ($id) {
            if ($item->id === $id) {
                $item->count++;
            }
            return $item;
        });
//dd($cookie);
        $this->setCookie($cookie);
        $this->dispatch('updateCartProducts');
    }

    public function decrement($id)
    {
        $cookie = collect(json_decode(request()->cookie('basket-products')));

        $cookie = $cookie->map(function ($item) use ($id) {
            if ($item->id === $id) {
                $item->count--;
            }
            return $item;
        })->filter(fn($item) => $item->count > 0); // удаляем, если стало 0

        $this->setCookie($cookie->values());
        $this->updateCartProducts();
    }

    protected function setCookie($cookie)
    {
        Cookie::queue(
            Cookie::make(
                'basket-products',
                json_encode($cookie),
                60,
                '/',
                null,
                false,
                false
            )
        );
    }

}
