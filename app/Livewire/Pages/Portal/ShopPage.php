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

    public $isWishlist = false;
    public $wishListProducts;

    public $sortBy = "Relevance";
    public $sortByColumn = "products.created_at";

    protected $listeners = ['updateShopProducts' => '$refresh'];

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
            ->when($this->sortBy !== 'Price: High to Low', function ($q) {
                return $q->orderBy($this->sortByColumn);
            })
            ->when($this->sortBy == 'Price: High to Low', function ($q) {
                return $q->orderByDesc('price');
            })
            ->when($this->isWishlist, function ($query) {
                return $query->whereIn('products.id', $this->wishListProducts->pluck('id') ?? [99999999999]);
            })
            ->with('brand')
            ->with('media')
            ->select('products.*') // ВАЖНО: иначе будет мешанина полей из join
            ->take(5)
            ->get();

        return view('livewire.pages.portal.shop-page');
    }

    public function mount() {
        if (request()->is('wishlist*')) {
            // URL начинается с /wishlist
            $this->isWishlist = true;
            $cookie = collect(json_decode(request()->cookie('wishlist-products')));
            $this->wishListProducts = Product::whereIn('id', $cookie->pluck('id'))
                ->with('media')
                ->get();
        } else {
            $this->isWishlist = false;
        }
    }

    public function clearAllFilters()
    {
        $this->gender = [];
        $this->category = [];
    }

    public function setSort($option)
    {
        $this->sortBy = $option;
        if ($this->sortBy === "Relevance") {
            $this->sortByColumn = "products.created_at";
        } elseif ($this->sortBy === "Newest Arrivals") {
            $this->sortByColumn = "products.created_at";
        } elseif ($this->sortBy === "Bestsellers") {
            $this->sortByColumn = "products.created_at";
        } elseif ($this->sortBy === "Price: High to Low") {
            $this->sortByColumn = "price ";
        } elseif ($this->sortBy === "Price: Low to High") {
            $this->sortByColumn = "price";
        }
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
