<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserPostController extends Controller
{
    public function index(User $user): View
    {
        $posts = $user->posts()->with('user')->paginate(20);

        return view('common.users.posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
