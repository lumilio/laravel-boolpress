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
                    <label for="cover" class="form-label">cover</label>
                    <input type="text" name='cover' id='cover' class='form-control' placeholder='http://' aria-describedby='coverHelper' value="{{$post->cover}}">
                    <small id="coverHelper" class="text-muted">insert cover</small>
                    @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3'>
                    <label for="description" class="form-label">description</label>
                    <textarea class='form-control' name="description" id="description" rows="5" >{{$post->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div style='position:relative; height:4rem;' class="container-fluid d-flex alig-items-right">
                    <button style='position:absolute; right:0;' type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection