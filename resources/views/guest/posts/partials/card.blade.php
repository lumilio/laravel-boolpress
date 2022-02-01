<div class="card mb-4" style="width: 50%">
    <div class="card-body">
        <p class="card-text">{{$item->description}}€</p>
         <a href="{{route('guest.posts.show', $item->slug)}}" class="btn txt-white btn-primary">Vai</a>
    </div>
    <img class="card-img-top" src="{{$item->cover}}" alt="Card image cap">
</div>