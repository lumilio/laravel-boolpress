<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $category_arrey = Category::all();
        $filtered_posts = $category->posts()->orderByDesc('id')->paginate(50);
        return view('guest.categories.posts', compact('filtered_posts','category','category_arrey'));
    }
}
