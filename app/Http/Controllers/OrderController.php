<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;


class OrderController extends Controller
{
    //
    public function AllOrder(){
    $products = Product::latest()->paginate(10);
    $carts = Cart::content();
    
    return view('order.index', compact('products', 'carts'));
    }

    public function AllReport(){
        $reports = Order::latest()->paginate(10);
        return view('report.index', compact('reports'));
    }

    public function StoreOrder(Request $request){
        $carts = Cart::content();

        foreach($carts as $cart){
            $product = Product::find($cart->id);

            if($product->product_stock>0){
                Order::insert([
                    'product_id' => $cart->id,
                    'product_name' => $cart->name,
                    'product_price' => $cart->price,
                    'qty' => $cart->qty,
                    'created_at' => Carbon::now()
                ]);
                
                $update = Product::find($product->id)->update([
                    'product_stock' => ($product->product_stock - $cart->qty),
                ]);
            }
            else{
                return redirect()->back()->with('error', 'Item is Out of Stock!');
            }
        }
        Cart::destroy();
        return redirect()->back()->with('success', 'Check out confirmed!');

        
    }
}
