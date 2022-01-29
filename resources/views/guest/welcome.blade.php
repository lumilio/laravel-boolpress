
@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">Welcome page</div>
        <div class="links">
            <a href="{{route('guest.posts.index')}}">Products</a>
            <a href="">Blog</a>
            <a href="">About us</a>
        </div>
    </div>
</div>
@endsection
