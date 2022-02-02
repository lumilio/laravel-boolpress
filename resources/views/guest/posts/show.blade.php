@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        <div class='me-2'>
            <img class='mb-2'src="{{$post->cover}}" alt="">
            <h4>post scritto da utente n.{{$post->id}}</h4>
            <p>{{$post->description}}</p>


<!---------------------- Badge categoria e tags assegnati -->
            <p> categoria :
            @if($post->category != null)
            <span class="badge bg-light"><a href="{{route('guest.categories.post', $post->category->slug)}}">{{$post->category->name}}</a></span>
            @else
            non specificata
            @endif
            </p>


            <p> tags :
            @forelse ($choose_tag as $item)
            <span class="badge text-black bg-warning"><a href="{{route('guest.tags.post', $item->slug)}}">{{$item->name}}</a></span>
            @empty
                no data
            @endforelse 
            </p>
<!------------------------------------->

            @auth  <!-- è possibile autenticarsi da qui? -->
            <a href="{{route('admin.posts.edit', $post->slug)}}">modifica</a>
            @endauth
        </div>
    </div>
</div>
@endsection