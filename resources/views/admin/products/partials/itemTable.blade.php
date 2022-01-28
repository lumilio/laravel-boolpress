<div class="container">
    <div class="">
        <div style='position:relative; height:4rem;' class="container-fluid d-flex align-items-right">
            <a href="{{route('admin.products.create')}}"><button style='position:absolute; right:0;' class='mb-2 mt-4 float-end"'><i class="fas fa-plus"></i> Add Item</button></a>
        </div>        
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
                            <a href="{{route('admin.products.edit', $item->id)}}"><i class="fas fa-edit mx-2"></i></a>
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

