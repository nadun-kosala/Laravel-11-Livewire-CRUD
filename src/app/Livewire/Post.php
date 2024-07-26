<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;

class Post extends Component
{
    public $isOpenCreateModal = false;

    public $title;
    public $category;
    public $content;
    public $posts = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'category' => 'required',
        'content' => 'required',
    ];

    public function openCreatePostModal()
    {
        $this->isOpenCreateModal = true;
    }

    public function closeCreatePostModal()
    {
        $this->isOpenCreateModal = false;
    }

    public function createPost()
    {
        $this->validate();
        $post = Story::create([
            'title' => $this->title,
            'category' => $this->category,
            'content' => $this->content,
        ]);
        $this->isOpenCreateModal = false;
    }

    public function render()
    {
        $this->posts = Story::all();
        return view('livewire.post', $this->posts);
    }
}
