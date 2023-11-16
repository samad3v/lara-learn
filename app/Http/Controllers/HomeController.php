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
            'post' => $post
        ]);
    }

    public function addComment(Request $request, int $post)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $content = $request->get('content');
        $post_id = $post;
        $comment = new Comment;
        $comment->name = $name;
        $comment->email = $email;
        $comment->content = $content;
        $comment->post_id = $post_id;
        $comment->save();

        return redirect(route('post.show', ['post' => $post_id]))->with([
            'comments' => Comment::all(),
            'status' => 'comment added successfully'
        ]);
        
    }
}
