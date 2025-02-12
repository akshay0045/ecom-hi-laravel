<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
function cartItemCount() {
    $cartCount = Cart::where('user_id','=',Auth::user()->id)->sum('qty');;
    return $cartCount;
}