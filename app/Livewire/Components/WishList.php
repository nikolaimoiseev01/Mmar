<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class WishList extends Component
{

    public $products;

    protected $listeners = [
        'updateWishlistProducts' => 'updateWishlistProducts',
        'addIdToWishlist' => 'addIdToWishlist'
    ];



    public function render()
    {
        return view('livewire.components.wish-list');
    }


    public function mount()
    {
        $this->updateWishlistProducts();
    }

    public function updateWishlistProducts()
    {
        $cookie = collect(json_decode(request()->cookie('wishlist-products')));
        $this->products = Product::whereIn('id', $cookie->pluck('id'))
            ->with('media')
            ->get();
    }

    public function addIdToWishlist(Request $request, $id, $price)
    {
        $cookie = collect(json_decode($request->cookie('wishlist-products')));

        if (!$cookie->contains('id', $id)) {
            $to_add = [
                'id' => $id,
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
                'wishlist-products',
                json_encode($cookie),
                60,
                '/',
                null,
                false,
                false
            )
        );

        $this->dispatch('afterWishlistUpdate');
        $this->dispatch('updateWishlistProducts');
        $this->dispatch('updateShopProducts');
    }
}
