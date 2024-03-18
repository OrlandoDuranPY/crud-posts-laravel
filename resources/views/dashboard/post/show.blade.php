@extends('dashboard.layout')

@section('title')
    Dashboard - Ver Post
@endsection

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{$post->content}}</p>
    <p>{{$post->description}}</p>
    <p>{{$post->posted}}</p>
    <p>{{$post->category->title}}</p>

@endsection
