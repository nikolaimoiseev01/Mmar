<?php

namespace App\Livewire\Pages\Account;

use App\Models\Product;
use Livewire\Component;

class WelcomePage extends Component
{
    public $products;
    public $contents;
    public function render()
    {
        $this->products = Product::orderBy('created_at', 'asc')->take(3)->get();
        $this->contents = [
            [
                'id' => 'personal_information',
                'title' => 'Personal Information',
            ],
            [
                'id' => 'shipping_addresses',
                'title' => 'Shipping Address',
            ],
            [
                'id' => 'order_history',
                'title' => 'Order History',
            ],
            [
                'id' => 'recently_viewed',
                'title' => 'Recently Viewed',
            ]
        ];
        return view('livewire.pages.account.welcome-page');
    }

    public function logout() {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->redirect(route('portal.index', absolute: false), navigate: true);
    }

}
