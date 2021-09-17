<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function AllOrder(){
    $content = Cart::content();
    $products = Product::latest()->paginate(10);
    return view('order.index', compact('products', 'content'));
    }

    public function StoreCart(Request $request){

        $product = Product::findOrFail($request->product_id);

        Cart::add([
            'id' => $product->id, 
            'name' => $product->product_name, 
            'qty' => $request->quantity, 
            'price' => $product->product_price,
            'weight' => 0
        ]);

        return redirect()->back()->with('success', 'Item added to Cart');
    }

    public function RemoveCart($id){

        Cart::remove($id);
        return Redirect()->back()->with('success', 'Item Removed Successfully');
    }

    public function ClearCart(){

        Cart::destroy();
        return Redirect()->back()->with('success', 'Cart Removed Successfully');
    }

    

}
