@extends('layouts.admin')

@section('content')
<div class=" container-fluid">
    <div class="container">
        <div style='width:100%' class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        </div>
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 ">
            <div style='height:80vh; background-color:lightgrey' class=" pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                        <span data-feather="home"></span>
                        Dashboard
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file"></span>
                        Orders
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
@endsection
