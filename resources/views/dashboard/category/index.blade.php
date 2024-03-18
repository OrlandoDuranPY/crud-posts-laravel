@extends('dashboard.layout')

@section('title')
    Dashboard - Home
@endsection

@section('content')

    <a href="{{route('category.create')}}">Crear categoria</a>

    <table class="text-left">
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
                        <a href="{{route('category.edit', $category)}}">Editar</a>
                        <a href="{{route('category.show', $category)}}">Ver</a>
                        <form action="{{route('category.destroy', $category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>No hay posts</tr>
            @endforelse
        </tbody>
    </table>

    {{-- Paginacion --}}
    {{$categories->links()}}
@endsection
