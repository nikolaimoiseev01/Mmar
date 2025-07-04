<?php

namespace App\Livewire\Pages\Account;

use Livewire\Component;

class WelcomePage extends Component
{
    public function render()
    {
        return view('livewire.pages.account.welcome-page');
    }

    public function logout() {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        $this->redirect(route('portal.index', absolute: false), navigate: true);
    }

}
