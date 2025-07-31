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
                $product->count =$cookie_product->count ?? 1;
                $product->count_price =$cookie_product->count * $product->price;
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
            Cookie::queue(
                Cookie::make(
                    'basket-products',          // Имя куки
                    json_encode($cookie),       // Значение
                    60,                         // Срок действия в минутах
                    '/',                        // Путь
                    null,                       // Домен
                    false,                      // Безопасный SSL (true для HTTPS)
                    false                       // HttpOnly (false делает куку доступной для JavaScript)
                )
            );
            $this->dispatch('afterBasketUpdate');
            $this->dispatch('updateCartProducts');
        } else {
        }
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
