<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Spatie\QueryBuilder\QueryBuilder;

class ShopPage extends Component
{
//    #[Url(as: 'q')]
//    public $gender;

    public $hasAnyFilter = false;
    public $filtersArray;
    #[Url]
    public $gender = [];
    #[Url]
    public $category = [];
    #[Url]
    public $subcategory = [];
    #[Url]
    public $exclusive = [];
    #[Url]
    public $customization_options = [];
    #[Url]
    public $material_focus = [];
    #[Url]
    public $availability = [];

    public $products;

    public $sortBy = 'products.created_at';

    public function render()
    {
        $this->filtersArray = collect([
            'gender' => $this->gender,
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'exclusive' => $this->exclusive,
            'customization_options' => $this->customization_options,
            'material_focus' => $this->material_focus,
            'availability' => $this->availability
        ]);
        $this->hasAnyFilter = $this->filtersArray->filter()->isNotEmpty();
//        dd($this->filtersArray );

        $this->products = QueryBuilder::for(Product::class)
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->when($this->gender, function ($q) {
                return $q->whereIn('gender', $this->gender);
            })
            ->when($this->category, function ($q) {
                return $q->whereIn('categories.name', $this->category);
            })
            ->when($this->subcategory, function ($q) {
                return $q->whereIn('subcategories.name', $this->subcategory);
            })
            ->when($this->exclusive, function ($q) {
                return $q->whereIn('exclusive', $this->exclusive);
            })
            ->when($this->customization_options, function ($q) {
                return $q->whereIn('customization_options', $this->customization_options);
            })
            ->when($this->material_focus, function ($q) {
                return $q->whereIn('material_focus', $this->material_focus);
            })
            ->when($this->availability, function ($q) {
                return $q->whereIn('availability', $this->availability);
            })
            ->when($this->sortBy !== 'price_desc', function ($q) {
                return $q->orderBy($this->sortBy);
            })
            ->when($this->sortBy == 'price_desc', function ($q) {
                return $q->orderByDesc('price');
            })
            ->with('brand')
            ->with('media')
            ->select('products.*') // ВАЖНО: иначе будет мешанина полей из join
            ->take(5)
            ->get();

        return view('livewire.pages.portal.shop-page');
    }

    public function clearAllFilters()
    {
        $this->gender = [];
        $this->category = [];
    }

    public function setSort($option)
    {
        $this->sortBy = $option;
    }

    public function removeFilter($filterKey, $filterValue)
    {
        if (property_exists($this, $filterKey)) {
            $this->$filterKey = array_values( // сброс индексов!
                array_filter(
                    $this->$filterKey,
                    fn($item) => $item !== $filterValue
                )
            );
        }
    }

}
