<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
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

        // return $request->all();

        $cart = Cart::
        where("user_id", '=', $request->user_id)
        ->where('is_active',1)
        ->with('cartitems',function($query) use ($request){
            return $query->where('product_id',$request->product_id);
        })->first();
        
        if($cart && $cart->cartitems->count() > 0){
            $qty = $request->quantity + $cart->cartitems->first()->qty;
            $cart->cartitems->first()->update([
                'qty' => $qty
            ]);
        }else {
            if(!empty($cart) && !empty($cart->id)){
                $item = [
                    "cart_id" => $cart->id,
                    "product_id" => $request->product_id,
                    "qty" => $request->quantity
                ];
                Cartitem::insert($item);
            } else{
                $cart = Cart::create([
                    'is_active' => 1,
                    'user_id' => $request->user_id
                ]);
                $item = [
                    "cart_id" => $cart->id,
                    "product_id" => $request->product_id,
                    "qty" => $request->quantity
                ];
                Cartitem::insert($item);
            }
            
        }
        return redirect()->back()->with('success','Product add to cart successfully');
    }
}
