@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        <div class='me-2'>
            <img class='mb-2'src="{{$product->image}}" alt="">
            <span >Disponibilità : {{$product->quantity}} pz</span>
        </div>
        <div>
            <h4>{{$product->name}}</h4>
            <p>{{$product->price}}€</p>
            <p>{{$product->description}}</p>
            @auth
            <a href="{{route('admin.products.edit', $product->id)}}">modifica</a>
            @endauth
        </div>
    </div>
</div>
@endsection