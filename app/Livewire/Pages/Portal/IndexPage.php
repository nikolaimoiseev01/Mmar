<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Post;
use App\Models\Product;
use Livewire\Component;

class IndexPage extends Component
{
    public $products;
    public $post;
    public function render()
    {
        $this->products = Product::orderBy('created_at', 'desc')->take(3)->get();
        $this->post = Post::with(['postTopic', 'media'])
            ->orderBy('created_at', 'desc')
            ->first();
        return view('livewire.pages.portal.index-page');
    }
}
