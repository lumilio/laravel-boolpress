@extends('layouts.admin')

@section('content')
<div class=" container-fluid jusify-content-center">
    <div class="container">
        <div>
            <h1>edit post</h1>
            @include('admin.posts.partials.errorCreate')
            <form action="{{route('admin.posts.update', $post->slug)}}" method="post">
            @csrf
            @method('PUT')




            <div class='mb-3'>
                    <label for="token1" class="form-label">Dai un titolo univoco *</label>
                    <input type="text" name='token1' id='token1' class='form-control' placeholder='123456' aria-describedby='token1Helper' value="{{$post->token1}}">
                    <small id="token1Helper" class="text-muted">insert token1</small>
                    @error('token1')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3'>
                    <label for="token2" class="form-label">////</label>
                    <input type="text" name='token2' id='token2' class='form-control' placeholder='123456' aria-describedby='token2Helper' value="{{$post->token2}}">
                    <small id="token2Helper" class="text-muted">insert token2</small>
                    @error('token2')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
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




                <!------------- selectors ---------->
                <div class="form-group">
                    <label for="category_id">Categoria :</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value=''>-</option>
                        @foreach($arrey_category as $item)
                        <option value="{{$item->id}}" {{$item->id == old('item', $post->category_id) ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tags" class="form-label">Seleziona i Tags</label>
                    <select multiple style='height:150px' class="form-select" name="tags[]" id="tags">
                            <option disabled>Select tags</option>
                            @foreach($tags as $item)
                            <option value="{{$item->id}}" {{$post->tags->contains($item->id) ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                    </select>
                </div>




                <div style='position:relative; height:4rem;' class="container-fluid d-flex alig-items-right">
                    <button style='position:absolute; right:0;' type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection