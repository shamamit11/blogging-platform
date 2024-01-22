<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Services\BlogPostService;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    private $blogPostService;

    public function __construct(BlogPostService $blogPostService)
    {
        $this->blogPostService = $blogPostService;
    }

    public function index()
    {
        $posts = BlogPost::all();
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = BlogPost::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    public function store(CreateBlogPostRequest $request)
    {
        $validatedData = $request->validated();

        $this->authorize('create', BlogPost::class);

        $post = $this->blogPostService->create($validatedData);

        return response()->json($post, 201);
    }

    public function update(UpdateBlogPostRequest $request, $id)
    {
        $post = BlogPost::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $this->authorize('update', $post);

        $validatedData = $request->validated();

        $post = $this->blogPostService->update($post, $validatedData);

        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = BlogPost::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $this->authorize('delete', $post);

        $this->blogPostService->delete($post);

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
