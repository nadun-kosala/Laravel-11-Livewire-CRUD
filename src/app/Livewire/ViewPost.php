<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Story;

class ViewPost extends Component
{
    public $post;


    public function mount($id){
       $this->post = Story::find($id);
    }

    public function render()
    {
        return view('livewire.view-post');
    }
}
