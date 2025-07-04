<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Post;
use Livewire\Component;

class InsightsPage extends Component
{
    public $posts;
    public function render()
    {
        $this->posts = Post::with(['postTopic', 'media'])
            ->get();
        return view('livewire.pages.portal.insights-page');
    }
}
