<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('guest.welcome');
});

Auth::routes();

Route::namespace('Guest')->prefix('guest')->name('guest.')->group(function(){
    Route::resource('products','ProductController')->only(['index','show'])->parameter('product', 'post:slug');
    Route::resource('posts','PostController')->only(['index','show'])->parameter('post', 'post:slug');
    Route::get('categories/{category:slug}/posts', 'CategoryController@index')->name('categories.post');
    Route::get('tags/{tags:slug}/posts', 'TagController@index')->name('tags.post');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('products','ProductController')->parameter('product', 'post:slug');
    Route::resource('posts','PostController')->parameter('product', 'post:slug');
    Route::resource('categories','CategoryController')->parameter('product', 'post:slug');
    Route::resource('tags','TagController')->parameter('product', 'post:slug');
});


/* ------ slug ?? ------- */


