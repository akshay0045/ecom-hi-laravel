<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
