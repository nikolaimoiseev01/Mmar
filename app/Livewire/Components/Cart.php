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
                $product->count = $cookie[$product->id]->count ?? 1;
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
            dd('Уже есть в куках!');
        }
    }
}
