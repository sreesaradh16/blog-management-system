@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>

    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card mb-3 
            {{ $post->comments_count > 100 ? 'bg-danger text-white' : '' }}">
                <div class="card-body">
                    @if($post->image)
                    <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->title }}" style="max-width: 50%; height: 200px;">
                    @endif
                    <h5 class="card-title">Category : {{ $post->category->name }}</h5>
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text">
                        <strong>Tags: </strong>
                        @foreach($post->tags as $tag)
                        <span>{{ $tag->name }}</span>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection