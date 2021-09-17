<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b> @livewire('cart-counter') </b>
        
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                    
                        <div class="card-header">All Product</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <!-- <th scope="col">Product Image</th> -->
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Stock(s) left</th>
                                    <th scope="col">Quantity</th>
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
                                    
                                    <form action="{{ route('store.cart') }}" method="POST">
                                    <td>
                                        <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </td>
                                    <td>
                                        
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                                            <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                                            <button type="submit" class="btn btn-info">Add to Cart</button>
                                        
                                    </td>
                                    </form>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $products->links() }}

                    </div>
                </div>
                
            </div>
            
        </div>

        <br>
        <!-- //cart -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <div class="card-header">CART</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <!-- <th scope="col">Product Image</th> -->
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($carts as $cart)
                                <tr>
                                    <th scope="row">{{ $cart->id }}</th>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ $cart->price }}</td>
                                    <td>{{ $cart->qty }}</td>
                                    <td>{{ $cart->priceTotal }}</td>
                                    <td><a href="{{ url('/cart/remove/'.$cart->rowId) }}" class="btn btn-danger">Remove Item</a></td>
                                </tr>
                                @endforeach
                                <tr>
                                <td style="text-align: right;" colspan="6"><code>Sub Total: <b>{{Cart::subtotal()}}</b></code></td>
                                </tr>
                                <tr>
                                <td style="text-align: left;"colspan="3"><a href="{{ route('clear.cart') }}" class="btn btn-warning">CLEAR CART</a></td>
                                <td style="text-align: right;"colspan="3"><a href="{{ route('store.order')}}" class="btn btn-success">CONFIRM CHECKOUT</a></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        

                    </div>
                </div>
                
            </div>
            
        </div>

        
    </div>
</x-app-layout>
