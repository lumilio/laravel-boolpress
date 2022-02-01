<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_array  = Post::orderByDesc('id')->paginate(12);
        $category_array = Category::all();
        $tag_array = Tag::all();
        return view('guest.posts.index',compact('post_array','category_array','tag_array'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //ddd($post->tags);
        //ddd($post->category->name);
        $choose_tag = $post->tags;
        return view('guest.posts.show', compact('post','choose_tag'));
    }


}
