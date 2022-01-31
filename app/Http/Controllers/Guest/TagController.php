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
    public function index(Tag $tag)
    {
        $category_arrey = Category::all();
        $tag_arrey = Tag::all();
        $filtered_posts = $tag->posts()->orderByDesc('id')->paginate(50);
        //ddd($tag_arrey);
        return view('guest.tags.posts', compact('filtered_posts','tag','tag_arrey','category_arrey'));
    }
}
