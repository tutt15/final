<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'producttype_id', 'description', 'price', 'promotion_price', 'image', 'unit', 'new'];

    public function producttype(){
        return $this->belongsTo('App\ProductType','id');
    }
    public function bills(){
        return $this->belongsToMany('App\Bill', 'BillDetails', 'bill_id', 'product_id')->withPivot('price', 'promotion_price', 'quantity');
    }
    public function carts(){
        return $this->belongsToMany('App\Cart', 'cart_detail','cart_id', 'product_id');
    }
}
