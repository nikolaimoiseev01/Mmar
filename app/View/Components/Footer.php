<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */

    public $menu = [];

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::all()->toArray();
        $this->menu = [
            'Customer Service' => [
                [
                    'name' => 'Contact Us',
                    'url' =>  route('portal.contact'),
                ],
                [
                    'name' => 'Order Tracking',
                    'url' => '/',
                ],
                [
                    'name' => 'Delivery and Returns',
                    'url' => route('portal.shipping-info'),
                ],
                [
                    'name' => 'Size Guide',
                    'url' => route('portal.size-guide'),
                ],
                [
                    'name' => 'FAQs',
                    'url' => route('portal.faq'),
                ]
            ],
            'About' => [
                [
                    'name' => 'Sustainability',
                    'url' => route('portal.sustainability'),
                ],
                [
                    'name' => 'Our Story',
                    'url' => '/',
                ],
                [
                    'name' => 'Journal',
                    'url' => route('portal.insights'),
                ],
            ],
            'Follow Us' => [
                [
                    'name' => 'Instagram',
                    'url' => '/',
                ],
                [
                    'name' => 'TikTok',
                    'url' => '/',
                ]
            ]
        ];
        return view('components.footer', ['categories' => $categories]);
    }
}
