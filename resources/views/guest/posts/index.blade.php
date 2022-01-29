@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex justify-content-center flex-wrap">
        @forelse ($post_arrey as $item)
        <div class="card mb-4" style="width: 50%">
            <div class="card-body">
                <p class="card-text">{{$item->description}}€</p>
                <a href="{{route('guest.posts.show', $item->id)}}" class="btn btn-primary">Vedi</a>
            </div>
            <img class="card-img-top" src="{{$item->cover}}" alt="Card image cap">
        </div>
        @empty
            <p>no data</p>
        @endforelse 
    </div>
</div>
@endsection