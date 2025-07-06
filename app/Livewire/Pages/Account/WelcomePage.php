<?php

namespace App\Livewire\Pages\Account;

use App\Models\Product;
use Livewire\Component;

class WelcomePage extends Component
{
    public $products;
    public function render()
    {
        $this->products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('livewire.pages.account.welcome-page');
    }

    public function logout() {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->redirect(route('portal.index', absolute: false), navigate: true);
    }

}
