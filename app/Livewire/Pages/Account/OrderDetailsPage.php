<?php

namespace App\Livewire\Pages\Account;

use Livewire\Component;

class OrderDetailsPage extends Component
{
    public $contents;
    public function render()
    {
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
        return view('livewire.pages.account.order-details-page');
    }
}
