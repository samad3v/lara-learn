<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index')->with(['posts' => Post::with('category')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create')->with(['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'image' => ['required', 'file'],
            'status' => ['required', 'min:0', 'max:1' , 'integer'],
            'summery' => ['required', 'string'],
            'category_id' => ['required','exists:categories,id']
        ]);

        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->image = $request->file('image')->store('posts');
        $post->status = $request->get('status');
        $post->summery = $request->get('summery');
        $post->category_id = $request->get('category_id');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect(route('admin.posts.index')) ->with([
            'status' => 'Post created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.posts.edit')->with([
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'image' => ['nullable', 'file'],
            'status' => ['required', 'min:0', 'max:1' , 'integer'],
            'summery' => ['required', 'string'],
            'category_id' => ['required','exists:categories,id']
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->content = $request->get('content');
        $post->summery = $request->summery;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts');
        }

        $post->save();

        return redirect(route('admin.posts.index'));
    }

    public function changeStatus(Post $post)
    {
        $post->status = request()->get('new_status');
        $post->save();
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('admin.posts.index'));
    }
}
