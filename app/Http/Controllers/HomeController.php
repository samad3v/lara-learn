<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'posts' => Post::where('status', 1)->get(),
            'categories' => Category::all()
        ]);
    }

    public function showPost(Post $post)
    {
        return view('post', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }
}
