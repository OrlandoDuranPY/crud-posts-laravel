@extends('dashboard.layout')

@section('title')
    Dashboard - Home
@endsection

@section('content')

    <a href="{{route('post.create')}}" class="btn btn-primary">Crear post</a>

    <table class="table">
        <thead>
            <tr>
                <th class="p-1">Title</th>
                <th class="p-1">Categoria</th>
                <th class="p-1">Posted</th>
                <th class="p-1">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td class="p-1">{{ $post->title }}</td>
                    <td class="p-1">{{ $post->category->title }}</td>
                    <td class="p-1">{{ $post->posted }}</td>
                    <td class="p-1">
                        <a href="{{route('post.edit', $post)}}" class="btn btn-success">Editar</a>
                        <a href="{{route('post.show', $post)}}" class="btn btn-warning">Ver</a>
                        <form action="{{route('post.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
            <p>No hay posts</p>
            @endforelse
        </tbody>
    </table>

    {{-- Paginacion --}}
    {{$posts->links()}}
@endsection
