<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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

    public function changeStatus(Request $request, Comment $comment)
    {
        return redirect(route('admin.comments.index'));
        $comment = Comment::find($id)->where('status',pending)->update(['status' => publised]);
        $comment->status = $request->get('status');
        $comment->save();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect(route('admin.comments.index'));
    }
}
