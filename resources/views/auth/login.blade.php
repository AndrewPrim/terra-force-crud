@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="login-form" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="email" class="col-lg-4 col-form-label text-end">E-Mail Address</label>
                                <div class="col-lg-6">
                                    <input id="email" type="text" class="form-control @error('email') border-danger @enderror"
                                           name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                           autocomplete="email" >
                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                    @if(Session::has('message'))
                                        <small class="text-danger">
                                            {{ Session::get('message') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="password" class="col-lg-4 col-form-label text-end">Password</label>
                                <div class="col-lg-6">
                                    <input id="password" type="password" class="form-control @error('password') border-danger @enderror"
                                           name="password" placeholder="Enter your password" >
                                    @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-lg-6 offset-lg-4">
                                    <input id="remember" type="checkbox" name="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" id="js-btn-login" class="btn btn-primary btn-shadow-primary">
                                        Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
