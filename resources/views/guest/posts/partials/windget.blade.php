<div class="d-flex flex-column">
    <div style='width:300px;  position: sticky; top: 10px; 'class="container is-fixed-top text-white bg-secondary p-3">
        <ul style='list-style:none;'>
            <h3>Categories</h3>
            <li><a style='color:white;' href="{{route('guest.posts.index')}}">All</a></li>
            @forelse ($category_arrey as $item)
            <li>
                <a style='color:white;' href="{{route('guest.categories.post', $item->slug)}}">{{$item->name}}</a>
                <span class="badge bg-primary">{{$item->posts()->count()}}</span>
            </li>
            @empty
            <li>no data</li>
            @endforelse 
        </ul>

        <ul class='mt-5' style='list-style:none;'>
        <h3>Tags</h3>
            <li><a style='color:white;' href="{{route('guest.posts.index')}}">All</a></li>
            @forelse ($category_arrey as $item)
            <li>
                <a style='color:white;' href="{{route('guest.tags.post', $item->slug)}}">{{$item->name}}</a>
                <span class="badge bg-primary">{{$item->posts()->count()}}</span>
            </li>
            @empty
            <li>no data</li>
            @endforelse 
        </ul>
    </div>
</div>



