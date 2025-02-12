<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
}
