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
                    <div style='position:relative; height:4rem;' class="container-fluid d-flex align-items-right">
                        <a href="{{route('admin.products.create')}}"><button style='position:absolute; right:0;' class='mb-2 mt-4 float-end"'><i class="fas fa-plus"></i> Add Item</button></a>
                    </div>
                    
                    <div class="">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <table class="table container">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product_arrey as $item)
                                    <tr>
                                        <td scope="row">{{$item->id}}</td>
                                        <td><img width='100' src="{{$item->image}}" alt=""></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>
                                            <a href="{{route('guest.products.show', $item->id)}}"><i class="far fa-eye mx-2"></i></a>
                                            <a href=""><i class="fas fa-edit mx-2"></i></a>
                                            <a href=""><i class="far text-danger fa-trash-alt mx-2"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <p>no data</p>
                                    @endforelse 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
