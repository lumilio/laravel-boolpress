@extends('layouts.admin')

@section('content')
<div class=" container-fluid">
    <div class="container">
        <div style='width:100%' class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class='d-flex'>
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 ">
                <div style='height:80vh; background-color:lightgrey' class="mt-3 pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">
                            <span data-feather="home"></span>
                            Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.products.index')}}">
                            <span data-feather="file"></span>
                            Products
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                    </div>
                                @endif

                                {{ Auth::user()->name }}, {{ __('you are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
