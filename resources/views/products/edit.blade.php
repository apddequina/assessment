<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product <b></b>
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Product</div>
                        <div class="card-body">
                        <form action="{{ url('product/update/'.$products->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Product Name</label>
                                <input type="text" name="product_name" class="form-control" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->product_name }}">

                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Product Price</label>
                                <input type="number" name="product_price" class="form-control" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->product_price }}">

                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Product Quantity</label>
                                <input type="number" name="product_stock" class="form-control" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->product_stock }}">

                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
