<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

/** Home route */
Route::get('/', [HomePageController::class, 'index'])->name('home');

/** Register routes */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

/** Login routes */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

/** Login route */
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

/** Posts routes */
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware([Authenticate::class])
    ->group(function (): void {
        Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post:slug}', [PostController::class, 'destroy'])->name('posts.delete');
        Route::get('/create-post', [PostController::class, 'create'])->name('create-post');
        Route::post('/create-post', [PostController::class, 'store']);
    });

/** Personal Posts Route */
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

