@extends('dashboard.layout')

@section('title')
    Dashboard - Crear Categoria
@endsection

@section('content')
    <h1>Crear Categoria</h1>

    @include('dashboard.fragments._errors-form')

    <form action="{{ route('category.update', $category) }}" method="POST" class="space-y-2" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.fragments._category-form')
    </form>
@endsection
