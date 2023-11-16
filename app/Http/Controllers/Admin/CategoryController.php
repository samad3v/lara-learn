<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.categories.index')->with([
        'categories' => Category::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $category = new Category;
        $category->title = $title;
        $category->save();

        return redirect(route('admin.categories.index'))->with([
            'status' => 'Category created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with([
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->save();
        return redirect(route('admin.categories.index'))->with([
            'status' => 'Category edited successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->posts->count()==0){
            $category->delete();
            return redirect(route('admin.categories.index'));
        }
        return redirect(route('admin.categories.index'))->with([
            'status' => 'this category cant be deleted!'
        ]);
    }
}
