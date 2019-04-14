<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
	protected $fillable = ['bill_id', 'product_id', 'quantity', 'price', 'promotion_price'];
    protected $table = "BillDetails";

}
