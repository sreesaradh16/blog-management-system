<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostRepository
{
    public function store($data)
    {
        $path = $data['image']->store('posts', 'public');

        $post = Post::create([
            'category_id' => $data['category_id'],
            'title' => Str::limit($data['title'], 255),
            'description' => Str::limit($data['description'], 1000),
            'image' => $path,
        ]);

        if (!empty($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return $post;
    }

    public function update($data, $post)
    {
        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post->description = $data['description'];

        if ($data['image']) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $data['image']->store('posts', 'public');
            $post->image = $path;
        }
        $post->save();
        $post->tags()->sync($data['tags']);
        return $post;
    }
    public function delete($post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
    }
}
