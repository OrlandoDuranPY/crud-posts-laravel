<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return response()->json($categories);
    }

    public function all()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create($request->validated());
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);
        return response()->json($category);
    }

    /* ========================================
    Buscar por slug
    ========================================= */
    public function slug($slug)
    {
        $post = Category::firstWhere('slug', $slug);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        return response()->json($category);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }

    /* ========================================
    Post en base a la categoria
    ========================================= */
    public function posts(Category $category)
    {
        // Forma Query Builder
        // $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
        // ->select('posts.*', 'categories.title as category')
        // ->where('categories.id', $category->id)
        // ->get();

        // Forma Eloquent
        $posts = Post::with('category')
            ->where('category_id', $category->id)->get();

        return response()->json($posts);
    }
}
