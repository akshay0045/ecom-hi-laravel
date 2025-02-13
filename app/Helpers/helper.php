<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
function cartItemCount() {
    $cartItem = Cart::
        where("user_id", '=', Auth::user()->id)
        ->where('is_active',1)
        ->withSum('cartitems','qty')->first();
        // dd($cartItem);  
        // return $cartItem;
        if($cartItem != null && $cartItem->cartitems_sum_qty && $cartItem->cartitems_sum_qty > 0){
            return $cartItem->cartitems_sum_qty ;
        } else{
            return 0;
        }
        
}