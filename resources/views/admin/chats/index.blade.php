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
                        <th>Cover</th>
                        <th>Actions</th>
                        <th width="70%">Content</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($message_array as $item)
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item['e-mail']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['content']}}</td>
                        <td></td>

                        <td>
                            <a href=""><i class="far fa-eye mx-2"></i></a>



         
                        </td>
                    </tr>
                    @empty
                        <p>no data</p>
                    @endforelse
                </tbody>
            </table>
            {{$post_array->links()}}
        </div>
    </div>
</div>
@endsection