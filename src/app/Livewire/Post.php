<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;
use Livewire\WithPagination;
use App\Handlers\PostHandler;
use Illuminate\Support\Facades\Session;

class Post extends Component
{
    use WithPagination;
    protected $postHandler;

    public $isOpenCreateModal = false;
    public $isOpenEditPostModal = false;
    public $isOpenDeletePostModal = false;

    public $title;
    public $category;
    public $content;

    public $updateTitle;
    public $updateCategory;
    public $updateContent;
    public $editPost;

    public $deletePost;

    public $openToast = false;

    public $searchInput;
    public $searchResult;

    protected $rules = [
        'title' => 'required|string|max:255',
        'category' => 'required',
        'content' => 'required',
    ];

    function __construct()
    {
        $this->postHandler = new PostHandler();
    }

    public function resetField()
    {
        $this->reset(['title', 'category', 'content']);
    }

    public function openCreatePostModal()
    {
        $this->resetField();
        $this->isOpenCreateModal = true;
    }

    public function createPost()
    {
        try {
            $this->validate();
            $story = new Story([
                'title' => $this->title,
                'category' => $this->category,
                'content' => $this->content,
            ]);
            $this->postHandler->createPost($story);
            $this->isOpenCreateModal = false;
            $this->resetField();

            Session::flash('message', 'Post successfully created');
            Session::flash('type', 'success');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function openEditPostModal($id)
    {
        try {
            $this->reset(['updateTitle', 'updateCategory', 'updateContent']);
            $this->resetErrorBag();
            $this->editPost = Story::findOrFail($id);
            $this->updateTitle = $this->editPost->title;
            $this->updateCategory = $this->editPost->category;
            $this->updateContent = $this->editPost->content;
            $this->isOpenEditPostModal = true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updatePost($id)
    {
        try {
            $this->validate([
                'updateTitle' => 'required|string|max:255',
                'updateCategory' => 'required',
                'updateContent' => 'required',
            ]);
            $updateStory = new Story([
                'title' => $this->updateTitle,
                'category' => $this->updateCategory,
                'content' => $this->updateContent,
            ]);
            $this->postHandler->updatePost($id, $updateStory);

            $this->isOpenEditPostModal = false;

            Session::flash('message', 'Post successfully updated');
            Session::flash('type', 'success');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function openDeletePostModal($id)
    {
        $this->deletePost = Story::findOrFail($id);
        $this->isOpenDeletePostModal = true;
    }

    public function confirmDeletePost($id)
    {
        try {
            $this->postHandler->deletePost($id);
            $this->isOpenDeletePostModal = false;

            Session::flash('message', 'Post successfully deleted');
            Session::flash('type', 'danger');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function closeNotification()
    {
        if (!Session::has('message')) {
            $this->openToast = true;
        }
    }

    public function search(){}

    public function render()
    {
        if (!Session::has('message')) {
            $this->openToast = false;
        }

        if ($this->searchInput) {
            $searchResult = $this->postHandler->search($this->searchInput);
            return view('livewire.post', ['posts' => $searchResult]);
        }

        $allPosts = $this->postHandler->allPosts();
        return view('livewire.post', ['posts' => $allPosts]);
    }
}
