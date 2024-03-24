@extends('web.layout')

@section('title')
    Blog - Post
@endsection

@section('content')
    <x-web.blog.post.show :post="$post" />
@endsection
