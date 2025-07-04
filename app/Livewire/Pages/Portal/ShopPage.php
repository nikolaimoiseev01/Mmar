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

    public $products;

    public $sortBy = 'products.created_at';

    public function render()
    {
        $this->hasAnyFilter = collect([
            $this->gender,
            $this->category
        ])->filter()->isNotEmpty();

        $this->filtersArray = collect([
            'gender' => $this->gender,
            'category' => $this->category
        ]);
//        dd($this->filtersArray );

        $this->products = QueryBuilder::for(Product::class)
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->when($this->gender, function ($q) {
                return $q->whereIn('gender', $this->gender);
            })
            ->when($this->category, function ($q) {
                return $q->whereIn('categories.name', $this->category);
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

    public function setSort($option) {
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
