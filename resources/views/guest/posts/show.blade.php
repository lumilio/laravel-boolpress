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













            @foreach ($tag_arrey as $item1)
            @if(in_array($item1,$choose_tag))

            <a style='color:white;' href="{{route('guest.tags.post', $item1->slug)}}">{{$item1->name}}</a>

            @else
            <p>nessun tag assegnato</p>
            @endif
            @endforeach






            @auth  <!-- è possibile autenticarsi da qui? -->
            <a href="{{route('admin.posts.edit', $post->slug)}}">modifica</a>
            @endauth
        </div>
    </div>
</div>
@endsection