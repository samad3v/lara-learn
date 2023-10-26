<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'posts' => Post::where('status', 1)->get(),
            'categories' => Category::all()
        ]);
    }

    public function showPost(Post $post) {
        return view('post', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }
}
