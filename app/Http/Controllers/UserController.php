<?php

namespace App\Http\Controllers;

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
}
