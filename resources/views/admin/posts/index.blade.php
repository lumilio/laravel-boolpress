@extends('admin.layouts.DashboardTemplate')

@section('table')
<div class="container">
    <div class="">
        <div style='position:relative; height:4rem;' class="container-fluid d-flex align-items-right">
            @if (session('message1'))
            <div class="mt-2 alert alert-success">
                {{ session('message1') }}
            </div>
            @elseif (session('message2'))
            <div class="mt-2 alert alert-warning">
                {{ session('message2') }}
            </div>
            @elseif (session('message3'))
            <div class="mt-2 alert alert-danger">
                {{ session('message3') }}
            </div>
            @endif
            <a href="{{route('admin.posts.create')}}"><button style='position:absolute; right:0;' class='mb-2 mt-4 float-end"'><i class="fas fa-plus"></i> Crea Post</button></a>
        </div>        
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <table class="table container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th width="70%">Content</th>
                        <th>Cover</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($post_arrey as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->description}}</td>
                        <td><img width='100' src="{{$item->cover}}" alt=""></td>

                        <td>
                            <a href="{{route('guest.posts.show', $item->slug)}}"><i class="far fa-eye mx-2"></i></a>
                            <a href="{{route('admin.posts.edit', $item->slug)}}"><i class="fas fa-edit mx-2"></i></a>


                            <!-- Button trigger modal ------------------------->
                            <a type="button" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}">
                                <i class="far text-danger fa-trash-alt mx-2"></i>
                            </a>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$item->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete item {{$item->id}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Attenzione! l'operazione non sarà reversibile.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            <form class="mx-2" method='post' action="{{route('admin.posts.destroy', $item->slug)}}">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Do it!</i></button>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ---------------------------------------------->
                        </td>
                    </tr>
                    @empty
                        <p>no data</p>
                    @endforelse
                </tbody>
            </table>
            {{$post_arrey->links()}}
        </div>
    </div>
</div>
@endsection
