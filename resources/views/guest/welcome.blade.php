
@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">Laravel Shop</div>
        <div class="links">
            <a href="{{route('guest.products.index')}}">Products</a>
            <a href="">Blog</a>
        </div>
    </div>
</div>
@endsection
