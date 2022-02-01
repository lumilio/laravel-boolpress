<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag, Category $category)
    {
        $category_array = Category::all();
        $tag_array = Tag::all();
        $filtered_posts = $tag->posts()->orderByDesc('id')->paginate(50);
        //ddd($tag_array);
        return view('guest.tags.posts', compact('filtered_posts','tag','category','tag_array','category_array'));
    }
}
