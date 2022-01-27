@extends('layouts.app')

@section('content')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        @forelse ($product_arrey as $item)



        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$item->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{$item->price}}</p>
                <a href="#" class="btn btn-primary">mostra</a>
            </div>
        </div>







        @empty
            <p>no data</p>
        @endforelse 
    </div>
</div>
@endsection