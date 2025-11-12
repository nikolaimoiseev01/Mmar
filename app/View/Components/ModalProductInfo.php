<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalProductInfo extends Component
{
    /**
     * Create a new component instance.
     */
    public $contents;
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->contents = [
            'details' => $this->product['details'],

            'materials' => $this->product['materials_detailed'],

            'aftercare' => $this->product['aftercare'],

            'manufacturing' => $this->product['manufacturing']
        ];
        return view('components.modal-product-info');
    }
}
