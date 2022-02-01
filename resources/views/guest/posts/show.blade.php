@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        <div class='me-2'>
            <img class='mb-2'src="{{$post->cover}}" alt="">
            <h4>post scritto da utente n.{{$post->id}}</h4>
            <p>{{$post->description}}</p>


            @if($post->category != null)
            <p>categoria : <a href="{{route('guest.categories.post', $post->category->slug)}}">{{$post->category->name}}</a></p>
            @else
            <p>categoria : non specificata</p>
            @endif


            <p> tags :
            @forelse ($choose_tag as $item)
            <a href="{{route('guest.tags.post', $item->slug)}}">{{$item->name}}</a>--
            @empty
                no data
            @endforelse 
            </p>


            @auth  <!-- è possibile autenticarsi da qui? -->
            <a href="{{route('admin.posts.edit', $post->slug)}}">modifica</a>
            @endauth
        </div>
    </div>
</div>
@endsection