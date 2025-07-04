<?php

namespace App\Livewire\Pages\Portal;

use Livewire\Component;

class ContactUsPage extends Component
{
    public $links;

    public function render()
    {
        $this->links = [
            [
                'title' => 'FAQ',
                'link' => ''
            ],
            [
                'title' => 'Size Guide',
                'link' => ''
            ],
            [
                'title' => 'Shipping & Returns Policy',
                'link' => ''
            ]
        ];
        return view('livewire.pages.portal.contact-us-page');
    }
}
