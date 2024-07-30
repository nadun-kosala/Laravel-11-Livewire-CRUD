<?php

namespace App\Handlers;

use App\Models\Story;

class PostHandler
{

    public function createPost(Story $story, $photo)
    {

        if ($photo) {
            $filePath = $photo->store('uploads', 'public');
        }
        dd($filePath);
        return Story::create([
            'title' => $story->title,
            'category' => $story->category,
            'content' => $story->content,
        ]);
    }

    public function updatePost(int $id, Story $updateStory)
    {
        $editPost = Story::findOrFail($id);
        $editPost->title = $updateStory->title;
        $editPost->category = $updateStory->category;
        $editPost->content = $updateStory->content;
        return $editPost->save();
    }

    public function deletePost($id)
    {
        $deletePost = Story::findOrFail($id);
        return $deletePost->delete();
    }

    public function search(string $searchInput){
       return Story::where('title', 'like', "%{$searchInput}%")->paginate(6);
    }

    public function allPosts(){
        return Story::paginate(6);
    }
}

?>
