<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function AllProd(){
    $products = Product::latest()->paginate(10);
    return view('products.index', compact('products'));
    }

    public function StoreProd(Request $request){
        $validated = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_price' => 'required|max:255',
        ]);

        //ELOQUENT ORM

        Product::insert([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock
        ]);

        return Redirect()->back()->with('success', 'Product Inserted Successfully');
    }

    public function Edit($id){
        // $categories = Category::find($id);
        $products = Product::find($id);
        return view('products.edit', compact('products'));
    }

    public function Update(Request $request, $id){
        $update = Product::find($id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock

        ]);

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->where('id', $id)->update($data);

        return Redirect()->route('all.prod')->with('success', 'Product Updated Successfully');
    }

    public function Delete($id){
        $product = Product::find($id);
        Product::find($id)->delete();
        return Redirect()->back()->with('success', 'Product Deleted Successfully');

    }

    
}
