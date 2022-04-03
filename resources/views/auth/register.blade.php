@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="register-form" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-lg-4 col-form-label text-end">
                                    {{ __('Name') }}</label>
                                <div class="col-lg-6">
                                    <input id="name" type="text" class="form-control @error('name') border-danger @enderror"
                                           name="name" value="{{ old('name') }}" placeholder="Enter your name" autofocus >
                                    @error('name')<small class="text-danger mt-1">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="username" class="col-lg-4 col-form-label text-end">
                                    {{ __('Username') }}</label>
                                <div class="col-lg-6">
                                    <input id="username" type="text" class="form-control @error('username') border-danger @enderror"
                                           name="username" value="{{ old('username') }}" placeholder="Enter your username" >
                                    @error('username')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="email" class="col-lg-4 col-form-label text-end">
                                    {{ __('E-Mail Address') }}</label>
                                <div class="col-lg-6">
                                    <input id="email" type="text" class="form-control @error('email') border-danger @enderror"
                                           name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                           autocomplete="email" >
                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="password" class="col-lg-4 col-form-label text-end">
                                    {{ __('Password') }}</label>
                                <div class="col-lg-6">
                                    <input id="password" type="password" class="form-control @error('password') border-danger @enderror" name="password"
                                           placeholder="Enter your password" >
                                    @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="password-confirmation" class="col-lg-4 col-form-label text-end">
                                    {{ __('Password Confirmation') }}</label>
                                <div class="col-lg-6">
                                    <input id="password-confirmation" type="password" class="form-control @error('password') border-danger @enderror"
                                           name="password_confirmation" placeholder="Repeat your password" >
                                    @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" id="js-btn-login" class="btn btn-primary btn-shadow-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
