<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('create');
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // $validated = Validator::make($request->all(), $request->rules());
        // dd($request->rules());
        // dd($validated->fails());

        // Crear el registro del post en la DB
        Post::create($request->validated());

        // Redireccionar al index
        return to_route('post.index')->with('status', 'Registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        // dd($request->validated());
        if (isset($data['image'])) {
            // Referencia al nombre de la imagen
            // dd($request->image);
            $data['image'] = $filename = time() . '.' . $data['image']->extension();

            // Guardar la imagen en el disco
            $request->image->move(public_path('images'), $filename);
            // dd($request->validated()['image']);

        }

        $post->update($data);

        // Redireccionar al index y session flash
        return to_route('post.index')->with('status', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        // Borrar el registro del post en la DB
        $post->delete();

        // Redireccionar al index
        return to_route('post.index')->with('status', 'Registro eliminado');
    }
}
