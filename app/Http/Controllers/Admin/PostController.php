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
        $data = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'image' => ['required', 'file'],
            'status' => ['required', 'min:0', 'max:1' , 'integer'],
            'category_id' => ['required','exists:categories,id']
        ]);

        $data['image'] = $request->file('image')->store('posts');
        $data['user_id'] = auth()->user()->id;

        Post::create($data);

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
        $post = Post::find($id);
        $post->title = $request->title;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('posts');
            $post->image = $image;
        }

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
