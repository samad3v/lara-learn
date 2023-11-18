<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;


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
            'post' => $post->load(['comments' => function($query){
                return $query->where('status', 'published');
            }])
        ]);
    }

    public function addComment(Request $request, int $post)
    {
        $comment = new Comment;
        $comment->name = $request->get('name');
        $comment->email = $request->get('email');
        $comment->content = $request->get('content');
        $comment->post_id = $post;
        $comment->save();

        return redirect(route('post.show', ['post' => $post]))->with([
            'comments' => Comment::all(),
            'status' => 'comment added successfully'
        ]);

    }
}
