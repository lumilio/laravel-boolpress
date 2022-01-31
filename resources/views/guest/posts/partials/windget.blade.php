<div style='width:300px; height:100%; position: sticky; top: 10px; 'class="container is-fixed-top text-white bg-secondary p-3">
    <ul style='list-style:none;'>
        <li><a style='color:white;' href="{{route('guest.posts.index')}}">All</a></li>
        @forelse ($category_arrey as $item)
        <li><a style='color:white;' href="{{route('guest.categories.post', $item->slug)}}">{{$item->name}}</a></li>
        @empty
        <li>no data</li>
        @endforelse 
    </ul>
</div>