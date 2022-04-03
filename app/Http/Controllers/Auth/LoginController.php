<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $request->remember)) {
            return redirect(route('posts'));
        }

        return back()->with('message', 'These credentials do not match our records.');
    }
}
