<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {
    }

    public function index()
    {
        $categories = $this->service->getAll(['posts', 'children']);
        return view('category.list', compact('categories'));
    }

    public function create()
    {
        $categories = $this->service->getAll(['posts', 'children']);
        $route = route('category.store');
        $button = 'Kaydet';
        return view('category.editor', compact('categories', 'route', 'button'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.editor', [
            'route' => route('category.update', $category),
            'category' => $category->load('children'),
            'button' => 'Güncelle',
            'categories' => $this->service->getAll(['posts', 'children']),
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->service->update($category, $request->validated());
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
       $this->service->delete($category);
       return redirect()->route('category.index');
    }

}
