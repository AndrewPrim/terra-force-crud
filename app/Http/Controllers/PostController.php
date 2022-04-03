<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user')
            ->where('is_archived', false)
            ->latest()
            ->paginate(10);

        return view('common.posts.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('common.posts.create');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $request->merge([
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)))
        ]);

        $request->validated();

        $request->user()->posts()->create([
            'slug' => $request->slug,
            'title' => $request->title,
            'body' => $request->post_body,
            'is_archived' => $request->is_archived ?? false,
        ]);

        return redirect(route('posts'));
    }

    public function show(Post $post): View
    {
        return view('common.posts.show', ['post' => $post]);
    }

    public function edit(Post $post): View
    {
        return view('common.posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);

        $request->merge([
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)))
        ]);
        $request->validated();

        $request->user()
            ->posts()
            ->where('posts.id', $post->id)
            ->update([
                'slug' => $request->slug,
                'title' => $request->title,
                'body' => $request->post_body,
                'is_archived' => $request->is_archived ?? false,
            ]);

        return redirect(route('posts'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
