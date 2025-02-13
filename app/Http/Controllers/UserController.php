<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cartitem;
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
        $carts = Cart::where('user_id', Auth::user()->id)->where('is_active', 1)->with('user')->with('cartitems.products')->first();
        // return $carts;
        if($carts && $carts->cartitems->count() > 0){
            return view('checkout.cart',compact('carts'));
        }
        return redirect("/");
    }
    public function qtyupdate(Request $request){
        $cartItems = Cartitem::where('product_id',$request->product_id)->where('cart_id',$request->cart_id)->first();
        // return [$request->all(),$cartItems];
        $updatedcarts = $cartItems->update([
            'qty' => $request->qty
        ]);
        return response()->json($updatedcarts);
    }
    public function cartitemdelete(Request $request){
        $deletecarts = Cartitem::where('product_id',$request->product_id)->where('cart_id',$request->cart_id)->delete();
        
        return response()->json($deletecarts);
    }
    public function checkout(Request $request){

        $carts = Cart::where('user_id',Auth::user()->id)->where('is_active',1)->with('user.useraddresses')->with('cartitems.products')->first();

        // return $carts;
        if($carts) {
            return view('checkout.checkout',compact('carts'));
        }
        return redirect('/');
    }
    public function placeorder(Request $request){    

        $carts = Cart::where('user_id',Auth::user()->id)->where('is_active',1)->with('user.useraddresses', function($query) use ($request){
            return $query->find($request->input('shipping-address'));
        })->with('cartitems.products')->first();
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
            'shipping-name' => $carts->user->name,
            'shipping-email-address' => $request->input('billing-email-address'),
            'shipping-phone' => $carts->user->useraddresses[0]->mobile,
            'shipping-address' => $carts->user->useraddresses[0]->address,
            'shipping-country' => $carts->user->useraddresses[0]->country,
            'shipping-city' => $carts->user->useraddresses[0]->city,
            'shipping-zip-code' => $carts->user->useraddresses[0]->zip_code,
            'pay-method' => $request->input('pay-method'),
            'shipping_charges' => $request->input('shipping_charges'),
            'tax' => $request->input('tax'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total')
        ];
        $order = Order::create($orderData);
        $orderItemData= [];
        foreach ($carts->cartitems as $key => $item) {
            $orderItemData[] = [
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->products->product_name,
                'product_qty' => $item->qty,
                'product_price' => $item->products->product_price
            ];
        }
        $orderItem = Orderitem::insert($orderItemData); 
        Cart::find($request->cart_id)->update([
            'is_active' => 0
        ]);
        return redirect(route('order.successpage',['id' =>$order->id])); 
    }

    public function successpage($id){
        $order = Order::find( $id );
        if($order){
            return view('checkout.success',compact('order'));
        }
        return redirect('/');
    }

    public function customer($type){
        $sidebar = "user_dashboard_sidebar";
        if("account" == strtolower($type)){
            $data = Order::where("user_id",Auth::User()->id)->get();
            $page = "user_dashboard_dashboard";
        }
        elseif("address" == strtolower($type)){
            $data = User::where("id",Auth::User()->id)->with('useraddresses')->first();
            // return $data;
            $page = "user_dashboard_address";
        }
        elseif("order" == strtolower($type)){
            $data = Order::where("user_id",Auth::User()->id)->get();
            $page = "user_dashboard_order";
        }
        
        // return $orders;
        return view('user.dashboard',['data'=>$data,"sidebar"=>'user_dashboard_sidebar',"page" => $page]);
    }

    public function orderview($id){
        $order = Order::find( $id );
        if($order){
            return view('user.orderdetail',compact('order'));
        }
    }
}
