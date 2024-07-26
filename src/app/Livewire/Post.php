<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;

class Post extends Component
{
    public $isOpenCreateModal = false;
    public $isOpenEditPostModal = false;
    public $isOpenDeletePostModal = false;

    public $title;
    public $category;
    public $content;
    public $posts = [];

    public $updateTitle;
    public $updateCategory;
    public $updateContent;
    public $editPost;

    public $deletePost;

    public $openToast = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'category' => 'required',
        'content' => 'required',
    ];

    public function resetField()
    {
        $this->reset(['title', 'category', 'content']);
    }

    public function openCreatePostModal()
    {
        $this->isOpenCreateModal = true;
    }

    public function closeCreatePostModal()
    {
        $this->isOpenCreateModal = false;
        $this->resetField();
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

        $this->resetField();

        session()->flash('message', 'Post successfully created');
        session()->flash('type', 'success');
    }

    public function openEditPostModal($id)
    {
        $this->editPost = Story::findOrFail($id);
        $this->updateTitle = $this->editPost->title;
        $this->updateCategory = $this->editPost->category;
        $this->updateContent = $this->editPost->content;
        $this->isOpenEditPostModal = true;
    }

    public function closeEditPostModal()
    {
        $this->isOpenEditPostModal = false;
    }

    public function updatePost($id)
    {
        $this->editPost = Story::findOrFail($id);
        $this->editPost->title = $this->updateTitle;
        $this->editPost->category = $this->updateCategory;
        $this->editPost->content = $this->updateContent;
        $this->editPost->save();
        $this->isOpenEditPostModal = false;

        session()->flash('message', 'Post successfully updated');
        session()->flash('type', 'success');
    }

    public function openDeletePostModal($id)
    {
        $this->deletePost = Story::findOrFail($id);
        $this->isOpenDeletePostModal = true;
    }
    public function closeDeletePostModal()
    {
        $this->isOpenDeletePostModal = false;
    }

    public function confirmDeletePost($id)
    {
        $deletePost = Story::findOrFail($id);
        $deletePost->delete();
        $this->isOpenDeletePostModal = false;

        session()->flash('message', 'Post successfully deleted');
        session()->flash('type', 'danger');
    }

    public function closeNotification()
    {
        if (!session()->has('message')) {
            $this->openToast = true;
        }
    }

    public function render()
    {
        if (!session()->has('message')) {
            $this->openToast = false;
        }
        $this->posts = Story::all();
        return view('livewire.post', $this->posts);
    }
}
