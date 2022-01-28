@extends('layouts.admin')

@section('content')
<div class=" container-fluid jusify-content-center">
    <div class="container">
        <div>
            <h1>create a new product</h1>
            @include('admin.products.partials.errorCreate')
            <form action="{{route('admin.products.store')}}" method="post">
            @csrf
                <div class='mb-3'>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name='name' id='name' class='form-control' placeholder='Hp 454' aria-describedby='nameHelper' value="{{old('name')}}">
                    <small id="nameHelper" class="text-muted">Type a name for your product</small>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3'>
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name='image' id='image' class='form-control' placeholder='http://' aria-describedby='imageHelper' value="{{old('image')}}">
                    <small id="imageHelper" class="text-muted">insert image</small>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3'>
                    <label for="price" class="form-label">price</label>
                    <input type="number" setp='0.01' name='price' id='price' class='form-control' aria-describedby='priceHelper' value="{{old('price')}}">
                    <small id="priceHelper" class="text-muted">insert price</small>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3'>
                    <label for="quantity" class="form-label">quantity</label>
                    <input type="number" name='quantity' id='quantity' class='form-control' aria-describedby='quantityHelper' value="{{old('quantity')}}">
                    <small id="quantityHelper" class="text-muted">insert quantity</small>
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3'>
                    <label for="description" class="form-label">description</label>
                    <textarea class='form-control' name="description" id="description" rows="5" >{{old('description')}}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div style='position:relative; height:4rem;' class="container-fluid d-flex alig-items-right">
                    <button style='position:absolute; right:0;' type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection