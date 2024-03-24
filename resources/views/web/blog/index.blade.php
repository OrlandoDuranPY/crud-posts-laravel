@extends('web.layout')

@section('title')
    Blog - Inicio
@endsection

@section('content')
    <x-web.blog.post.index :posts="$posts">
        @slot('header')
            <h1 class="mb-5 font-bold text-lg">Listado de Posts</h1>
        @endslot

        @slot('footer')
            <footer>
                Pie de pagina
            </footer>
        @endslot
    </x-web.blog.post.index>
@endsection
