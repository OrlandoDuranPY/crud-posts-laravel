@extends('dashboard.layout')

@section('title')
    Dashboard - Crear Categoria
@endsection

@section('content')
    <h1>Crear Categoria</h1>

    @include('dashboard.fragments._errors-form')

    <form action="{{ route('category.store') }}" method="POST" class="space-y-2" enctype="multipart/form-data">
        @include('dashboard.fragments._category-form')
    </form>
@endsection
