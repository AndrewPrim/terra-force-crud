@props(['post'  => $post])

<div class="col-md-10 col-lg-8 col-xl-7">
    <div class="post-preview">
        <a href="{{ route("posts.show", $post) }}" class="text-decoration-none text-dark">
            <h2 class="post-title">{{ $post->title}}</h2>
            <h5 class="post-subtitle">
                {!! Str::limit($post->body, 200, $end='...') !!}</h5>
            <a href="{{ route("posts.show", $post) }}">Read post</a>
        </a>
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
    <hr class="my-4">
</div>
