<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model 
{
	


	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['quantity'=>0, 'price' => $item->price, 'promotion_price' => $item->promotion_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['quantity']++;
		if( $item->promotion_price != 0){
			$giohang['price'] = $item->promotion_price * $giohang['quantity'];
			$this->totalPrice += $item->promotion_price;
		}
		else{
			$giohang['price'] = $item->price * $giohang['quantity'];
			$this->totalPrice += $item->price;
		}
		
		$this->items[$id] = $giohang;
		$this->totalQty++;
		
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['quantity']--;
		if( $this->items[$id]['item']['promotion_price'] != 0){
			$this->items[$id]['price'] -= $this->items[$id]['item']['promotion_price'];

			$this->totalPrice -= $this->items[$id]['item']['promotion_price'];
		}else{
			$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
			$this->totalPrice -= $this->items[$id]['item']['price'];
		}
		
		$this->totalQty--;
		
		if($this->items[$id]['quantity']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['quantity'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

	public function user(){
        return $this->belongsTo('App\User');
    }
}
