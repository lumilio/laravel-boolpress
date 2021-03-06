<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
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
        //$post_array = Post::orderByDesc('id')->paginate(5);
        $post_array = Auth::user()->posts()->orderByDesc('id')->paginate(5);
        return view('admin.posts.index',compact('post_array'));
    }




    /**
     * Show the form for creating a new resource.    //OK
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array_category = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('array_category','tags'));
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
            'token1'=>['required', 'unique:posts'],
            'token2'=>'nullable',
            'cover'=>'nullable',
            'description'=> 'nullable',
            'category_id'=> ['nullable','exists:categories,id'],
        ]);
        
        $validated['slug']= Str::slug($validated['token1']);
        $validated['user_id']= Auth::id();
        $post = Post::create($validated);


        //----------------------------------------------------- si fa per relazioni many to many?
        if($request->has('tags')){
            $request->validate([
                'tags'=> ['nullable','exists:tags,id'],
            ]);
        }
        //----------------------------------------------------- 

        $post->tags()->attach($request->tags);
        return redirect()->route('admin.posts.index')->with('message1', "un nuovo post ?? stato creato");
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
        $array_category = Category::all();
        $tags = Tag::all();

        if(Auth::id()===$post->user_id) {
            return view('admin.posts.edit', compact('post','array_category','tags'));
        } else {
            abort(403);
        }
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
        if(Auth::id() === $post->user_id){
            $validated = $request->validate([
                'token1'=>['required', Rule::unique('posts')->ignore($post->id)],
                'token2'=>'nullable',
                'cover'=>'nullable',
                'description'=> 'nullable',
                'category_id'=> ['nullable','exists:categories,id'],
            ]);
            $validated['slug']= Str::slug($validated['token1']);
            $post->update($validated);

            //----------------------------------------------------- si fa per relazioni many to many?
            if ($request->has('tags')) {
                $request->validate([
                    'tags' => ['nullable', 'exists:tags,id']
                ]);
                $post->tags()->sync($request->tags);
            }
            //----------------------------------------------------- 
            return redirect()->route('admin.posts.index')->with('message2', "Il Post n.{$post->id} ?? stato modificato");
        } else{
            abort(403);
        } 
    }



    
    /**
     * Remove the specified resource from storage.  //OK
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Auth::id()===$post->user_id){
            $post->delete();
            return redirect()->route('admin.posts.index')->with('message3', "Il post n.{$post->id} non ?? pi?? nell'inventario");
        } else{
            abort(403);
        }
    }
}
