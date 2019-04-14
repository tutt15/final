<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['date_order', 'total', 'note', 'payment', 'created_at'];

    public $timestamps = false;

    public function products(){
        return $this->belongsToMany('App\Product', 'BillDetails', 'bill_id', 'product_id')->withPivot('price', 'promotion_price', 'quantity');
    }
    public function user(){
        return $this->belongsTo('App\User','customer_id');
    }
}
