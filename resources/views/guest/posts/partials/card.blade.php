
<div class="card mb-4" style="width: 50%">

<!---------------------- Badge categoria e tags assegnati -->
    <p> categoria :
    @if($item->category != null)
    <span class="badge bg-light"><a href="{{route('guest.categories.post', $item->category->slug)}}">{{$item->category->name}}</a></span>
    @else
     non specificata
    @endif
    </p>


    <p> tags :
    @forelse ($item->tags as $i)
    <span class="badge text-black bg-warning"><a href="{{route('guest.tags.post', $i->slug)}}">{{$i->name}}</a></span>
    @empty
        no data
    @endforelse 
    </p>
<!------------------------------------->


    <div class="card-body">
        <p class="card-text">{{$item->description}}</p>
        <a href="{{route('guest.posts.show', $item->slug)}}" class="btn btn-primary">Vedi</a>
    </div>
    <img class="card-img-top" src="{{$item->cover}}" alt="Card image cap">
</div>