<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        if($request->method() == "POST"){
            
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ],[
                'email.required'=> 'Please Enter Email',
                'password.required'=> 'Please Enter Password',
            ]);

            Auth::attempt($request->only("email","password"));
            return redirect("/");
        }
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function logout(){
        Auth::logout();
        return redirect("/login");
    }

    public function cart(){
        $carts = Cart::where('user_id', Auth::user()->id)->with('user')->with('products')->get();
        if($carts->count() > 0){
            return view('checkout.cart',compact('carts'));
        }
        return redirect("/");
    }
    public function qtyupdate(Request $request){
        $carts = Cart::find( $request->cart_id );
        
        $updatedcarts = $carts->update([
            'qty' => $request->qty
        ]);
        return response()->json($updatedcarts);
    }
    public function cartitemdelete(Request $request){
        $carts = Cart::find( $request->cart_id );
        
        $deletecarts = $carts->delete();
        return response()->json($deletecarts);
    }
    public function checkout(Request $request){
        $carts = Cart::where('user_id',Auth::user()->id)->with('user')->with('products')->get();
        //return $carts;
        return view('checkout.checkout',compact('carts'));
    }
    public function placeorder(Request $request){       
        $carts = Cart::where('user_id',Auth::user()->id)->with('user')->with('products')->get();
        $shippingAddress = explode(",",$request->input('shipping-address'));
        $orderData = [
            'status' => "Processing",
            'user_id' => Auth::user()->id,
            'cart_id' => 2,
            'billing-name' => $request->input('billing-name'),
            'billing-email-address' => $request->input('billing-email-address'),
            'billing-phone' => $request->input('billing-phone'),
            'billing-address' => $request->input('billing-address'),
            'billing-country' => $request->input('billing-country'),
            'billing-city' => $request->input('billing-city'),
            'billing-zip-code' => $request->input('zip-code'),
            'shipping-name' => $shippingAddress[1],
            'shipping-email-address' => $request->input('billing-email-address'),
            'shipping-phone' => $shippingAddress[4],
            'shipping-address' => $shippingAddress[2],
            'shipping-country' => explode(" ",trim($shippingAddress[2]))[0],
            'shipping-city' => "Anand",
            'shipping-zip-code' => explode(" ",trim($shippingAddress[2]))[1],
            'pay-method' => $request->input('pay-method'),
            'shipping_charges' => $request->input('shipping_charges'),
            'tax' => $request->input('tax'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total')
        ];
        $order = Order::create($orderData);
        $orderItemData= [];
        foreach ($carts as $key => $item) {
            $orderItemData[] = [
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->products->product_name,
                'product_qty' => $item->qty,
                'product_price' => $item->products->product_price
            ];
        }
        $orderItem = Orderitem::insert($orderItemData); 
        return redirect(route('order.successpage',['id' =>$order->id])); 
    }

    public function successpage($id){
        $order = Order::find( $id );
        return view('checkout.success',compact('order'));
    }
}
