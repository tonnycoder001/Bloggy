<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class BlogPostList extends Component
{
    use WithPagination;


    // search
    public $search;


    public function delete(Post $post)
    {
        // delete todo
        $post->delete();
        session()->flash('message', 'Post deleted successfully.');
    }
    public function render()
    {

        return view('livewire.blog-post-list', [
            'posts' => Post::latest()->where('title', 'like', "%{$this->search}%")->orWhere('content', 'like', "%{$this->search}%")->paginate(5)

        ]);
    }
}
