<?php

namespace App\Helpers;

use App\Models\Story;

class PostHelper
{

    public function createPost(Story $story)
    {
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
}

?>
