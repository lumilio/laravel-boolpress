@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex  justify-content-center">
    @include('guest.posts.partials.windget')
    <div class="container d-flex flex-column align-items-center flex-wrap">
        <h3 style='display: block;'>TAG : {{$tag->name}}</h3>
        @forelse ($filtered_posts as $item)
        <div class="card mb-4" style="width: 50%">
            <div class="card-body">
                <span class="badge bg-info">{{$tag->name}}</span>
                <span class="badge bg-primary">{{$category->name}}</span>
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


if post id ha categorie mostra quelle
