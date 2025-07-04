<?php

namespace App\Livewire\Pages\Portal;

use Livewire\Component;

class FaqPage extends Component
{
    public $blocks;
    public function render()
    {

        $this->blocks = [
            'Shopping and Orders' => [
                [
                    'question' => 'How do I place an order?',
                    'answer' => 'To place an order, browse through our wide range of products from various (conscious) brands, add your desired items to the cart, and proceed to checkout. Follow the instructions to enter your shipping and payment details.'
                ],
                [
                    'question' => 'Can I modify or cancel my order?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel sem vitae nunc.'
                ],
                [
                    'question' => 'What payment methods do you accept?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'Do I need to create an account to place an order?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'How do I use a promo code?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
            'Shipping and Delivery' => [
                [
                    'question' => 'Where do you ship to?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'How much does shipping cost?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'How long will it take to receive my order?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'Can I track my order?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Do you offer sustainable packaging?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
            'Returns and Exchanges' => [
                [
                    'question' => 'What is your return policy?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'How do I initiate a return or exchange?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Are returns free?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'How long does it take to process a refund?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Can I return customised or made-to-order products?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
            'Product Information' => [
                [
                    'question' => 'Are all your products vegan?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'What materials are used in your products?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Are your products ethically made?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'How do I care for my items?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'What does "Made-to-Order" mean?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
            'Sustainability Practices' => [
                [
                    'question' => 'How do you ensure sustainability?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'Are your materials certified eco-friendly?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'What is your carbon footprint policy?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'How do you support sustainable fashion?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Can I learn more about your sustainability efforts?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
            'Account and Preferences' => [
                [
                    'question' => 'How do I create an account?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'I forgot my password—how do I reset it?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'How can I update my account details?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'Can I save items to a wishlist?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'How do I subscribe/unsubscribe to the newsletter?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
            'Contact and Support' => [
                [
                    'question' => 'How can I contact your customer service?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
                [
                    'question' => 'What are your customer service hours?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Can I chat with an AI assistant for quick help?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur.'
                ],
                [
                    'question' => 'How do I report an issue with my order?',
                    'answer' => 'Lorem ipsum dolor sit amet.'
                ],
                [
                    'question' => 'Where can I leave feedback?',
                    'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                ],
            ],
        ];


        return view('livewire.pages.portal.faq-page');
    }
}
