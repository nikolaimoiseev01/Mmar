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
    public $amount = 1;

    protected $listeners = ['addIdToCookie'];
    public function render()
    {
        $this->products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('livewire.pages.portal.product-page');
    }

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)
            ->with('brand')
            ->with('media')
            ->firstOrFail();
    }

    public function addIdToCookie(Request $request, $id)
    {
        $cookie = collect(json_decode($request->cookie('basket-products')));
        if (!$cookie->contains('id', $id)) {
            $to_add = [
                'id' => $id,
                'amount' => $this->amount,
                'price' => $this->product['price']
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
            $this->sent = true;
        } else {
            dd('Уже есть в куках!');
        }
    }
}
