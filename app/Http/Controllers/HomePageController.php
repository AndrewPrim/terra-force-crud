<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomePageController extends Controller
{
    public function index(): View
    {
        return view('common.home.index');
    }
}
