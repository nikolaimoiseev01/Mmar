<?php

namespace App\View\Components;

use App\Helpers\Constant;
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

    function mapOptions(array $items): array
    {
        return array_map(function ($item) {
            return [
                'label' => $item,
                'value' => $item,
            ];
        }, $items);
    }

    public function render(): View|Closure|string
    {
        $categories = Category::with('subcategories')->get();
        $categories = $categories->map(function ($category) {
            return [
                'label' => $category->name,
                'value' => $category->name,
                'suboptions' => $category->subcategories->map(function ($subcategory) {
                    return [
                        'label' => $subcategory->name,
                        'value' => $subcategory->name,
                    ];
                })->toArray(),
            ];
        });

        $exclusive = $this->mapOptions(Constant::EXCLUSIVE);
        $customization_options = $this->mapOptions(Constant::CUSTOMMIZATION_OPTIONS);
        $material_focus = $this->mapOptions(Constant::MATERIAL_FOCUS);
        $availability = $this->mapOptions(Constant::AVAILABILITY);

        $this->filters = [
            'gender' => [
                'label' => 'GENDER',
                'model' => 'gender',
                'options' => [
                    [
                        'label' => 'Menswear',
                        'value' => 'Menswear'
                    ],
                    [
                        'label' => 'Womenswear',
                        'value' => 'Womenswear'
                    ]
                ]
            ],
            'categories' => [
                'label' => 'CATEGORIES',
                'model' => 'category',
                'submodel' => 'subcategory',
                'options' => $categories->toArray()
            ],
            'exclusive' => [
                'label' => 'EXCLUSIVE',
                'model' => 'exclusive',
                'options' => $exclusive
            ],
            'customization_options' => [
                'label' => 'CUSTOMIZATION OPTIONS',
                'model' => 'customization_options',
                'options' => $customization_options
            ],
            'material_focus' => [
                'label' => 'MATERIAL FOCUS',
                'model' => 'material_focus',
                'options' => $material_focus
            ],
            'availability' => [
                'label' => 'AVAILABILITY',
                'model' => 'availability',
                'options' => $availability
            ]
        ];
        return view('components.shop-filters');
    }
}
