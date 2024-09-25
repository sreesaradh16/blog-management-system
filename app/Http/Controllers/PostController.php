<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\PostRepository;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB; 

class PostController extends Controller
{
    public $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', [
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|unique:posts,title|max:255',
            'image' => 'required|image|mimes:jpg,png,gif|max:1024',
            'description' => 'required|max:1000',
        ]);

        DB::beginTransaction();
        try {
            $post = $this->postRepository->store($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Something went wrong');
        }
        DB::commit();
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|unique:posts,title,' . $post->id,
            'image' => 'nullable|image|mimes:jpg,png,gif|max:1024',
            'description' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $post = $this->postRepository->update($request->all(), $post);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Something went wrong');
        }
        DB::commit();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->delete($post);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Something went wrong');
        }
        DB::commit();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
