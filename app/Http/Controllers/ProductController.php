<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy("id","desc")->get();
        return view("welcome",compact("products"));
    }

    public function detail($id){
        $product = Product::find($id);
        return view("product.detail",compact("product"));
    }
    public function search(Request $request){
        $products = Product::where('product_name', 'like','%'.$request->input('query').'%')->get();
        return view("product.search",compact("products"));
    }

    public function addtocart(Request $request){
        $cartItem = Cart::
        where("user_id", '=', $request->user_id)
        ->where("product_id", '=', $request->product_id)
        ->first();

        if($cartItem){
            $qty = $request->quantity + $cartItem->qty;
            $cartItem->update([
                'qty' => $qty
            ]);
        }else {
            Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'qty' => $request->quantity
            ]);
        }
        return redirect()->back()->with('success','Product add to cart successfully');
    }
}
