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
                'link' => route('portal.faq')
            ],
            [
                'title' => 'Size Guide',
                'link' => route('portal.size-guide')
            ],
            [
                'title' => 'Shipping & Returns Policy',
                'link' => route('portal.shipping-info')
            ]
        ];
        return view('livewire.pages.portal.contact-us-page');
    }
}
