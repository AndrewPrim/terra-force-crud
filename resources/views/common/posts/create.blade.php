@extends('layouts.app')

@section('content')

    <div class="container mb-5 mt-5">
        <div class="row text-center">
            <h1>Create Post</h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="post-form" action="{{ route('create-post') }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="title" class="col-lg-4 col-form-label text-end">
                                    Title</label>
                                <div class="col-lg-6">
                                    <input id="title" type="text" class="form-control @error('title') border-danger @enderror"
                                           name="title" value="{{ old('title') }}" placeholder="Enter post title" autofocus >
                                    @error('title')<small class="text-danger mt-1">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="post_body" class="col-lg-4 col-form-label text-end">
                                    Post Body</label>
                                <div class="col-lg-6">
                                    <textarea id="post_body" class="form-control @error('post_body') border-danger @enderror"
                                              name="post_body" rows="5" cols="30" placeholder="Enter post body" >{{ old('body') }}</textarea>
                                    @error('post_body')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-shadow-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
