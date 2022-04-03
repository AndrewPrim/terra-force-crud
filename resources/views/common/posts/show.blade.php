@extends('layouts.app')

@section('content')
    <div class="container px-4 px-lg-5 mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <a href="{{ route('posts') }}" class="text-decoration-none mb-3 d-block"><- Back to posts</a>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-preview">
                    <h1 class="post-title mb-4">{{ $post->title }}</h1>
                    <h5 class="post-subtitle">{{ $post->body }}</h5>
                    <hr class="my-4">
                    <p class="post-met mt-4">
                        Posted by
                        <a href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a>
                        on {{ $post->created_at->toDateString() }}
                    </p>
                </div>
                @auth
                    @can('delete', $post)
                        <form action="{{ route('posts.delete', $post) }}" class="d-inline-block mr-2" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete post</button>
                        </form>
                    @endcan

                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Update post</a>
                    @endcan
                @endauth
            </div>
        </div>
    </div>

@endsection
