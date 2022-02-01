@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center">
    @include('guest.posts.partials.windget')
    <div class="container d-flex justify-content-center flex-wrap">
        @forelse ($post_array as $item)
        @include('guest.posts.partials.card')
        @empty
            <p>no data</p>
        @endforelse 
    </div>
</div>
<div class="container-fluid d-flex justify-content-center">
    {{$post_array->links()}}
</div>
@endsection


