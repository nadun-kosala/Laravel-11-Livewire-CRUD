<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;
use Livewire\WithPagination;
use App\Handlers\PostHandler;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;

class Post extends Component
{
    use WithPagination, WithFileUploads;
    protected $postHandler;

    public $isOpenCreateModal = false;
    public $isOpenEditPostModal = false;
    public $isOpenDeletePostModal = false;

    public $title;
    public $category;
    public $content;
    public $photo;

    public $updateTitle;
    public $updateCategory;
    public $updateContent;
    public $updatePhoto;
    public $newPhoto;
    public $editPost;

    public $deletePost;

    public $openToast = false;

    public $searchInput;

    protected $rules = [
        'title' => 'required|string|max:255',
        'category' => 'required',
        'content' => 'required',
        'photo' => 'nullable|image|mimes:png,jpg|max:1024'
    ];

    function __construct()
    {
        $this->postHandler = new PostHandler();
    }

    public function resetField()
    {
        $this->reset(['title', 'category', 'content', 'photo']);
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
            
            $this->postHandler->createPost($story, $this->photo);
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
            $this->reset(['updateTitle', 'updateCategory', 'updateContent', 'newPhoto']);
            $this->resetErrorBag();
            $this->editPost = Story::findOrFail($id);
            $this->updateTitle = $this->editPost->title;
            $this->updateCategory = $this->editPost->category;
            $this->updateContent = $this->editPost->content;
            $this->updatePhoto = $this->editPost->imagePath;
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
                'newPhoto' => 'nullable|image|max:1024',
            ]);
            $updateStory = new Story([
                'title' => $this->updateTitle,
                'category' => $this->updateCategory,
                'content' => $this->updateContent,
            ]);
            $this->postHandler->updatePost($id, $updateStory, $this->newPhoto);

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

    public function search()
    {
    }

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
