<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Post;
use App\Models\PostTopic;
use Livewire\Component;

class InsightsPage extends Component
{
    public $posts;
    public $postTopics;
    public $selectedTopics = [];
    public function render()
    {
        $this->posts = Post::with(['postTopic', 'media'])
            ->when($this->selectedTopics, function ($q) {
                return $q->whereIn('post_topic_id', $this->selectedTopics);
            })
            ->get();
        $this->postTopics = PostTopic::all();
        return view('livewire.pages.portal.insights-page');
    }


    public function toggleTopic($id)
    {
        if (in_array($id, $this->selectedTopics)) {
            $this->selectedTopics = array_diff($this->selectedTopics, [$id]);
        } else {
            $this->selectedTopics[] = $id;
        }

    }
}
