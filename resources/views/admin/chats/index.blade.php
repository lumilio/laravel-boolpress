@extends('admin.layouts.DashboardTemplate')

@section('table')
<div class="container">
    <div class="">
        <div style='position:relative; height:4rem;' class="container-fluid d-flex align-items-right">
            @if (session('message'))
            <div class="mt-2 alert alert-success">
                {{ session('message') }}
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
        </div>        
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <table class="table container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Contact</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($message_array as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item['e-mail']}}</td>
                        <td>{{$item['name']}}</td>
                        <td class='d-flex'>
                            <a href="{{route('admin.inbox.show', $item->id)}}"><i class="far fa-eye mx-2"></i></a>
                            <form class="mx-2" method='post' action="{{route('admin.inbox.destroy', $item->id)}}">
                                @csrf 
                                @method('DELETE')
                                <button class='bg-white p-0' style='border:none;' type="submit" ><i type="submit" class="far text-danger fa-trash-alt mx-2"></i></button>
                            </form> 
                        </td>
                    </tr>
                    @empty
                        <p>no data</p>
                    @endforelse
                </tbody>
            </table>
            {{$message_array->links()}}
        </div>
    </div>
</div>
@endsection