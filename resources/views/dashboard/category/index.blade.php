@extends('dashboard.layout')

@section('title')
    Dashboard - Home
@endsection

@section('content')

    <a href="{{route('category.create')}}" class="btn btn-primary">Crear categoria</a>

    <table class="table">
        <thead>
            <tr>
                <th class="p-1">Title</th>
                <th class="p-1">Slug</th>
                <th class="p-1">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="p-1">{{ $category->title }}</td>
                    <td class="p-1">{{ $category->slug }}</td>
                    <td class="p-1">
                        <a href="{{route('category.edit', $category)}}" class="btn btn-success">Editar</a>
                        <a href="{{route('category.show', $category)}}" class="btn btn-warning">Ver</a>
                        <form action="{{route('category.destroy', $category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
            <p>No hay categorias</p>
            @endforelse
        </tbody>
    </table>

    {{-- Paginacion --}}
    {{$categories->links()}}
@endsection
