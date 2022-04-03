@extends('layouts.app')

@section('content')
    <div class="container mb-5 mt-5">
        <div class="row text-center">
            <h1>Posts</h1>
        </div>
    </div>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            @if($posts->count())
                @foreach($posts as $post)
                    <x-post-component :post="$post" />
                @endforeach
                <div class="col-md-10 col-lg-8 col-xl-7 d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
            @else
                <h3>Nothing to watch here for now.</h3>
            @endif
        </div>
    </div>
@endsection
