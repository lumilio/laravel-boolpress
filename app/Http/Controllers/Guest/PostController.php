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
        $post_arrey  = Post::orderByDesc('id')->paginate(12);
        $category_arrey = Category::all();
        $tag_arrey = Tag::all();
        return view('guest.posts.index',compact('post_arrey','category_arrey','tag_arrey'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $choose_tag = $post->tags;
        $tag_arrey = Tag::all();
        return view('guest.posts.show', compact('post','choose_tag','tag_arrey'));
    }


}
