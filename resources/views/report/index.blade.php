<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        SALES REPORTS 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    
                        <div class="card-header">Sales/Order Reports</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <!-- <th scope="col">Product ID</th> -->
                                    <!-- <th scope="col">Product Image</th> -->
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <th scope="row">{{ $report->id }}</th>
                                    
                                    <td>{{ $report->product_name }}</td>
                                    <td>{{ $report->product_price }}</td>
                                    <td>{{ $report->qty }}</td>
                                    <?php
                                        $total = $report->product_price * $report->qty; 
                                        ?>
                                    <td>{{ $total }}</td>
                                    <td>{{ $report->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $reports->links() }}

                    </div>
                </div>
                
            </div>
            
        </div>

        

        
    </div>
</x-app-layout>
