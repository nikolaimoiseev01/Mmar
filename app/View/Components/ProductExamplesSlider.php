<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductExamplesSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public $examples;
    public function __construct($examples)
    {
        $this->examples = $examples;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-examples-slider');
    }
}
