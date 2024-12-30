@extends('layouts.main')

@section('container')
    
    <h1 class="mb-5">{{ $post->title }}</h1>

    <p>By <a href="" class="text-decoration-none">{{ $post->author->name }}</a> <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</p></a>

    {!! $post->body !!}

    
    <a href="/blog" class="d-block mt-3">Back to Blog</a>
@endsection