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
            @error('name')
            <div class="alert alert-danger">CHANGES DENIED ⛔️  {{ $message }}</div>
            @enderror

<!-------------------------------- CREATE form modal -------------------------------------------->
            <a class='ms-4' type="button" data-bs-toggle="modal" data-bs-target="#create_tag">
            <button style='position:absolute; right:0;' class='mb-2 mt-4 float-end"'><i class="fas fa-plus"></i> Aggiungi TAG</button></a>
            </a>
                            
            <!-- Modal -->
            <div class="modal fade" id="create_tag" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crea TAG</h5>
                        </div>
                        <div class="modal-body">
                                            Dai un nome alla nuova TAG
                        </div>

                        <form class="mx-2" method='post' action="{{route('admin.tags.store')}}">
                        @csrf 
                            <input type="text" name='name' id='name' class='form-control' value="">
                            <div class="container-fluid d-flex justify-content-end">
                                <button type="button" class="btn mx-2 my-3 btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn my-3 text-white btn-success">Save</i></button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>  
<!------------>
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <table class="table container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nome</th>
                        <th>n.associati</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tag_array as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>

<!-------------------------------- EDIT MODAL -------------------------------------------->
                        <td>
                            {{$item->name}} 
                            <a class='ms-4' type="button" data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}">
                                rinomina
                            </a>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$item->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifica Nome</h5>
                                        </div>
                                        <div class="modal-body">
                                            Rinomina la TAG "{{$item->name}}" id: n.{{$item->id}}
                                        </div>

                                        <form class="mx-2" method='post' action="{{route('admin.tags.update', $item->slug)}}">
                                        @csrf 
                                        @method('PUT')
                                            <input type="text" name='name' id='name' class='form-control' value="{{$item->name}}">
                                            <div class="container-fluid d-flex justify-content-end">
                                                <button type="button" class="btn mx-2 my-3 btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn my-3 text-white btn-primary">Save</i></button>
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </td>
<!----------->
                        <td>
                            <span class="badge bg-primary">{{$item->posts()->count()}}</span>
                               <a class='mx-2' href="{{route('guest.tags.post', $item->slug)}}">
                                   <i class="far fa-eye mx-2"></i>
                                </a>    
                            </td>
<!-------------------------------- DELETE MODAL -------------------------------------------->
                        <td>
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

                                            <form class="mx-2" method='post' action="{{route('admin.tags.destroy', $item->slug)}}">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Do it!</i></button>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
<!--------------->
                    </tr>
                    @empty
                        <p>no data</p>
                    @endforelse
                </tbody>
            </table>
            {{$tag_array->links()}}
        </div>
    </div>
</div>
@endsection