@extends('dashboard.layout')

@section('title')
    Dashboard - Crear Post
@endsection

@section('content')
    <h1>Crear Post</h1>

    @include('dashboard.fragments._errors-form')

    <form action="{{ route('post.store') }}" method="POST" class="space-y-2" enctype="multipart/form-data">
        @include('dashboard.fragments._post-form')
    </form>
@endsection
