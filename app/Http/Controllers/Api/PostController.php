<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $posts = Post::with('tags', 'category')->paginate(10);
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|unique:posts,title|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:1024',
            'description' => 'required|max:1000',
            'tags' => 'array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $post = $this->postRepository->store($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        DB::commit();
        return response()->json($post->load('tags', 'category'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post->load('tags', 'category'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|unique:posts,title,' . $post->id . '|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1024',
            'description' => 'required|max:1000',
            'tags' => 'array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $post = $this->postRepository->update($request->all(), $post);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        DB::commit();
        return response()->json($post->load('tags', 'category'), 200);
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
            return response()->json(['error' => 'Something went wrong'], 500);
        }
        DB::commit();
        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
