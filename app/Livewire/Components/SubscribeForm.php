<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SubscribeForm extends Component
{
    public $step = 1;

    public $email = '';
    public $name = '';
    public $dob = '';


    public function render()
    {
        return view('livewire.components.subscribe-form');
    }

    public function nextStep()
    {
        $this->validateStep();
        if ($this->step < 4) {
            $this->step++;
        } else {
            $this->submit();
        }
    }

    public function validateStep()
    {
        if ($this->step == 1) {
            $this->validate(['email' => 'required|email']);
        } elseif ($this->step == 2) {
            $this->validate(['name' => 'required|string|min:2']);
        } elseif ($this->step == 3) {
            $this->validate(['dob' => 'required|date']);
            $this->submit();
        }
    }

    public function submit()
    {
        // Логика сохранения
        // Например: NewsletterSubscriber::create([...])
//        dd('test');

        session()->flash('message', 'You have successfully subscribed!');
//        $this->step += 1;
    }
}
