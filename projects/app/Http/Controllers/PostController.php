<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(protected PostService $service, protected CategoryService $categoryService)
    {
    }

    public function index()
    {
        $posts = $this->service->getAll(['category']);
        return view('post.list', compact('posts'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll(['children']);
        $route = route('post.store');
        $button = 'Kaydet';
        return view('post.editor', compact('categories', 'route', 'button'));
    }

    public function store(PostStoreRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('post.editor', [
            'route' => route('post.update', $post),
            'category' => $post->load('category'),
            'post' => $post,
            'button' => 'Güncelle',
            'categories' => $this->categoryService->getAll(['posts', 'children']),
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $this->service->update($post, $request->validated());
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $this->service->delete($post);
        return redirect()->route('post.index');
    }

}
