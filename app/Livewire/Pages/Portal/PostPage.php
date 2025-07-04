<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Post;
use Livewire\Component;

class PostPage extends Component
{
    public $post;
    public $other_posts;

    public function render()
    {
        return view('livewire.pages.portal.post-page');
    }

    public function mount($id)
    {
        $this->post = Post::with(['postTopic', 'media'])
            ->findOrFail($id);
        $this->other_posts = Post::where('id', '!=', $id)
            ->take(2)
            ->with(['postTopic', 'media'])
            ->get();
    }
}
