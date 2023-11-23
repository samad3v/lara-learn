<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comments.index')->with([
            'comments' => Comment::all()
        ]);
    }

    protected function show(Comment $comment)
    {
        return view('admin.comments.show',[
            'comment' => $comment
        ]);
    }

    public function changeStatus(Request $request, int $id)
    {   
        if ($comment->status == "pending") {
            $comment->status = "published";
        }elseif ($comment->status == "published") {
            $comment->status = "pending";
        }
        $comment->save();
        return redirect(route('admin.comments.index'));
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect(route('admin.comments.index'));
    }
}
