@extends('layouts.app')

@section('content')
    <div class="post-detail">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>
@endsection
