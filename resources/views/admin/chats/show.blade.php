


@extends('admin.layouts.DashboardTemplate')

@section('table')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        <div style='margin-top:300px' class='me-2'>

            <p>{{$message->name}}</p>
            <p>{{$message['e-mail']}}</p>
            <p>{{$message->content}}</p>


        </div>
    </div>
</div>
@endsection