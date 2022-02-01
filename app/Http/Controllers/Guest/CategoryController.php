<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, Tag $tag)
    {
        $category_array = Category::all();
        $tag_array = Tag::all();
        $filtered_posts = $category->posts()->orderByDesc('id')->paginate(50);
        //ddd($category_array);
        return view('guest.categories.posts', compact('filtered_posts','category','tag','category_array','tag_array'));
    }
}
