<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $title;
    public $content;
    public $image;

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:5',
        'image' => 'required|image|mimes:jpg,jpeg,png'
    ];

    public function createPost()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image->store('images', 'public')
        ]);


        session()->flash('message', 'Post created successfully!');


        $this->reset('title', 'content');
    }



    public function render()
    {
        return view('livewire.create-post');
    }
}
