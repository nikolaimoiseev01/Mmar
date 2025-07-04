<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShopFilters extends Component
{
    /**
     * Create a new component instance.
     */
    public $filters;
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::all()->map(function ($category) {
            return [
                'label' => $category->name,
                'value' => $category->name,
            ];
        });
        $this->filters = [
            'gender' => [
                'label' => 'GENDER',
                'model' => 'gender',
                'options' => [
                    [
                        'label' => 'male',
                        'value' => 'male'
                    ],
                    [
                        'label' => 'female',
                        'value' => 'female'
                    ]
                ]
            ],
            'categories' => [
                'label' => 'CATEGORIES',
                'model' => 'category',
                'options' => $categories->toArray()
            ],
        ];
        return view('components.shop-filters');
    }
}
