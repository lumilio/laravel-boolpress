@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex  justify-content-center">
    @include('guest.posts.partials.windget')
    <div class="container d-flex flex-column align-items-center flex-wrap">
        <h3 style='display: block;'>TAG : {{$tag->name}}</h3>
        @forelse ($filtered_posts as $item)
        @include('guest.posts.partials.card')
        @empty
            <p>no data</p>
        @endforelse 
    </div>
</div>
@endsection



