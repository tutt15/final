<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function show(){
        if(Session::has('cart')){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart    = new Cart($oldCart);
            $cart    = Session::get('cart');
        }
        else{
            return view('customer.page.cart');
        }
        $product_cart = $cart->items;
        $totalQty = $cart->totalQty;
        $totalPrice = $cart->totalPrice;

        //dd($cart);

        return view('customer.page.cart', compact('cart','product_cart', 'totalQty', 'totalPrice'));
    }

    public function getAddtoCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        
        $req->session()->put('cart', $cart );

        //dd($cart);
        return redirect()->back();
    }

    public function delete($id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart', $cart);
        }
        
        //dd($cart);
        return redirect()->back();
    }

    public function destroy($id){
        $product = Product::find($id);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart', $cart);
        }
        
        //dd($cart);
        return redirect()->back();
    }
    
}
