@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div style='width:300px; height:100%; position: sticky; top: 10px; 'class="container is-fixed-top text-white bg-secondary p-3">
        <ul style='list-style:none;'>
            <li><a style='color:white;' href="">All</a></li>
            @forelse ($category_arrey as $item)
            <li><a style='color:white;' href="">{{$item->name}}</a></li>
            @empty
            <li>no data</li>
            @endforelse 
        </ul>

    </div>
    <div class="container d-flex justify-content-center flex-wrap">
        @forelse ($post_arrey as $item)
        <div class="card mb-4" style="width: 50%">
            <div class="card-body">
                <p class="card-text">{{$item->description}}€</p>
                <a href="{{route('guest.posts.show', $item->slug)}}" class="btn btn-primary">Vedi</a>
            </div>
            <img class="card-img-top" src="{{$item->cover}}" alt="Card image cap">
        </div>
        @empty
            <p>no data</p>
        @endforelse 
    </div>

</div>
@endsection