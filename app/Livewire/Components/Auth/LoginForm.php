<?php

namespace App\Livewire\Components\Auth;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LoginForm extends Component
{
    public function render()
    {
        return view('livewire.components.auth.login-form');
    }

    public \App\Livewire\Forms\LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('account.welcome', absolute: false), navigate: true);
    }
}
