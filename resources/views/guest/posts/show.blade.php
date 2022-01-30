@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        <div class='me-2'>
            <img class='mb-2'src="{{$post->cover}}" alt="">
            <h4>post scritto da utente n.{{$post->id}}</h4>
            <p>{{$post->description}}</p>
            <p>categoria : {{$post->category != null ? $post->category->name : 'non specificata'}}</p>
            @auth
            <a href="{{route('admin.posts.edit', $post->slug)}}">modifica</a>
            @endauth
        </div>
    </div>
</div>
@endsection