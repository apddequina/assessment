<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All Product<b> </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <div class="card-header">All Product</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <!-- <th scope="col">Product Image</th> -->
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Stock(s) left</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_stock }}</td>
                                    
                                    <td>
                                        <a href="{{ url('product/edit/'.$product->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('product/delete/'.$product->id ) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $products->links() }}

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Product</div>
                        <div class="card-body">
                        <form action="{{ route('store.prod') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                               
                                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                               
                                <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                               
                               <label for="exampleInputEmail1" class="form-label">Stock(s) Available</label>
                               <input type="number" name="product_stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                               @error('product_stock')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror

                           </div>
                            
                           
                            
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</x-app-layout>
