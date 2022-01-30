<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Auth;

class PostController extends Controller 
{
    /**
     * Display a listing of the resource.   //OK
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_arrey = Post::orderByDesc('id')->paginate(5);
        return view('admin.posts.index',compact('post_arrey'));
    }

    /**
     * Show the form for creating a new resource.    //OK
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrey_category = Category::all();
        return view('admin.posts.create', compact('arrey_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        
        $validated = $request->validate([
            'cover'=>['required',],
            'description'=> 'nullable',
            'category_id'=> ['nullable','exists:categories,id'],
        ]);
        $validated['slug']= Str::slug($validated['cover']);
        Post::create($validated);
        return redirect()->route('admin.posts.index')->with('message1', "un nuovo post è stato creato");
    }

    /**
     * Display the specified resource.   //OK
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('guest.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.    //OK
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $arrey_category = Category::all();
        return view('admin.posts.edit', compact('post','arrey_category'));
    }

    /**
     * Update the specified resource in storage.  //OK
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'cover'=>['required'],
            'description'=> 'nullable',
            'category_id'=> ['nullable','exists:categories,id'],
        ]);
        $validated['slug']= Str::slug($validated['cover']);
        $post->update($validated);
        //return redirect()->route('guest.products.show', compact('product'));
        return redirect()->route('admin.posts.index')->with('message2', "Il Post n.{$post->id} è stato modificato");
    }

    /**
     * Remove the specified resource from storage.  //OK
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message3', "Il post n.{$post->id} non è più nell'inventario");
    }
}
