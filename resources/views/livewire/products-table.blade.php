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
                                    @if ($cart->where('id', $product->id)->count())
                                        <td colspan="2">In cart</td>
                                    @else
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
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>