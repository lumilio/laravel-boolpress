<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller 
{
    /**
     * Display a listing of the resource.   //OK
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_arrey = Post::paginate(5);
        return view('admin.posts.index',compact('post_arrey'));
    }

    /**
     * Show the form for creating a new resource.    //OK
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cover'=>['required'],
            'description'=> 'nullable',
        ]);
        Post::create($validated);
        return redirect()->route('admin.posts.index');
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
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
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
        ]);
        $post->update($validated);
        //return redirect()->route('guest.products.show', compact('product'));
        return redirect()->route('admin.posts.index')->with('message', "Il Post n.{$post->id} è stato modificato");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', "Il post n.{$post->id} non è più nell'inventario");
    }
}
