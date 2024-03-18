@extends('dashboard.layout')

@section('title')
    Dashboard - Editar Post
@endsection

@section('content')
    <h1>Editar Post: {{ $post->title }}</h1>

    @include('dashboard.fragments._errors-form')

    <form action="{{ route('post.update', $post) }}" method="POST" class="space-y-2" enctype="multipart/form-data">
        @method("PUT")
        @include('dashboard.fragments._post-form')
    </form>
@endsection
