<?php

namespace App\Handlers;

use App\Models\Story;

class PostHandler
{
    public function createPost(Story $story, $photo)
    {
        if ($photo) {
            $path = $photo->store('uploads', env('FILESYSTEM_DISK'));
            $filePath = 'storage/'. $path;
        }
        return Story::create([
            'title' => $story->title,
            'category' => $story->category,
            'content' => $story->content,
            'imagePath' => $filePath ?? null,
        ]);
    }

    public function updatePost(int $id, Story $updateStory, $photo)
    {
        if ($photo) {
            $path = $photo->store('uploads', env('FILESYSTEM_DISK'));
            $filePath = 'storage/'. $path;
        }
        $editPost = Story::findOrFail($id);
        $editPost->title = $updateStory->title;
        $editPost->category = $updateStory->category;
        $editPost->content = $updateStory->content;
        $editPost->imagePath = $filePath ?? null;
        return $editPost->save();
    }

    public function deletePost($id)
    {
        $deletePost = Story::findOrFail($id);
        unlink(public_path($deletePost->imagePath));
        return $deletePost->delete();
    }

    public function search(string $searchInput)
    {
        return Story::where('title', 'like', "%{$searchInput}%")->paginate(6);
    }

    public function allPosts()
    {
        return Story::latest()->paginate(6);
    }
}

?>
