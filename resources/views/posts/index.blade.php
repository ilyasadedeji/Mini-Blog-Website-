@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero Section for Latest Blog Post -->
    <section class="hero-section">
        @if ($latestPost)
            <div class="hero-content">
                <h1>Latest Blog Post</h1>
                <h2>{{ $latestPost->title }}</h2>
                <p>{{ Str::limit($latestPost->content, 200) }}</p>
                <a href="{{ route('posts.show', $latestPost->id) }}" class="btn btn-primary">Read More</a>
            </div>
        @else
            <p>No posts available.</p>
        @endif
    </section>

    <!-- Section Header -->
    <div class="section-header">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-secondary">Create a New Post</a>
    </div>

    <!-- Blog Cards for All Posts -->
    <section class="blog-cards">
        @foreach ($posts as $post)
            <div class="card">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="card-img">
                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Read More</a>
                </div>
            </div>
        @endforeach
    </section>
</div>
@endsection
