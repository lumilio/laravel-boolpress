@extends('layouts.admin')

@section('content')
<div class=" container-fluid jusify-content-center">
    <div class="container">
        <div>
            <h1>create a new post</h1>
            @include('admin.posts.partials.errorCreate')
            <form action="{{route('admin.posts.store')}}" method="post">
            @csrf
            <div class='mb-3'>
                    <label for="cover" class="form-label">cover</label>
                    <input type="text" name='cover' id='cover' class='form-control' placeholder='http://' aria-describedby='coverHelper' value="{{old('cover')}}">
                    <small id="coverHelper" class="text-muted">insert cover</small>
                    @error('cover')
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



                <!------------- cselectors ---------->
                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option selected disabled>Select a category</option>
                        @foreach($arrey_category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3 mt-3">
                    <label for="tags" class="form-label">Seleziona i Tags</label>
                    <select multiple style='height:150px' class="form-select" name="tags[]" id="tags">
                            <option disabled>Select tags</option>
                            @foreach($tags as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                    </select>
                </div>


                <div style='position:relative; height:4rem;' class="container-fluid d-flex alig-items-right">
                    <button style='position:absolute; right:0;' type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection