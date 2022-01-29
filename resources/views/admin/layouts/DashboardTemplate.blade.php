@extends('layouts.admin')

@section('content')
<div class=" container-fluid">
    <div class="container">
        @include('admin.partials.searchBar')
        <div class='d-flex'>
            @include('admin.partials.navBar')
            @yield('table')
        </div>
    </div>
</div>
@endsection