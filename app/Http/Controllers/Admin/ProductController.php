<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* return view('guest.products.index',['products'=>Product::all()]); */
        //$product_array = Product::all();
        //$product_array = Product::orderByDesc('id')->paginate(5);
        $product_array = Auth::user()->products()->orderByDesc('id')->paginate(5);
        return view('admin.products.index',compact('product_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        //ddd($request->all());
        //validazione
        $validated = $request->validate([
            'name'=>['required','unique:products'],
            'image'=>'nullable',
            'price'=> 'nullable',
            'quantity'=> 'nullable',
            'description'=> 'nullable',
        ]);
        $validated['slug']= Str::slug($validated['name']);
        $validated['user_id']= Auth::id();
        Product::create($validated);
        return redirect()->route('admin.products.index')->with('message1', "un nuovo prodotto è stato creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('guest.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //ddd($product->user_id);
        if(Auth::id()===$product->user_id){
            return view('admin.products.edit', compact('product'));
        } else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(Auth::id()===$product->user_id){
            $validated = $request->validate([
                'name'=>['required', Rule::unique('products')->ignore($product->id)],
                'image'=>'nullable',
                'price'=> 'nullable',
                'quantity'=> 'nullable',
                'description'=> 'nullable',
            ]);
            $validated['slug']= Str::slug($validated['name']);
            $product->update($validated);
            return redirect()->route('admin.products.index')->with('message2', "Il Prodotto n.{$product->id} è stato modificato");
        } else{
            abort(403);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Auth::id()===$product->user_id){
            $product->delete();
            return redirect()->route('admin.products.index')->with('message3', "Il Prodotto n.{$product->id} è stato eliminato");
        } else{
            abort(403);
        }
    }
}
