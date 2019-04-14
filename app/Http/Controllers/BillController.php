<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Session;

class BillController extends Controller
{
    public function index(){
        $bills = Bill::with('user')->paginate(10);
        //dd($bills);
        return view('ad.bills.index', ['bills'=>$bills]);
        
    }

    public function show($id)
    {
        $bill = Bill::find($id);

        return view('ad.bills.show', compact('bill'));
    }

    public function edit($id){
        $bill = Bill::find($id);
        return view('ad.bills.edit', ['bill'=>$bill]);
    }
    
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
      
       
        $bill->status = $request ->status;
        //$bill->customer_id = $request->customer_id;
        $bill->save();
        return redirect()->route('bills.index');
    }

    public function getBill(){
        if(Session::has('cart')){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart = Session::get('cart');
        }
        else{
            return view('customer.page.billdetail');
        }
        $product_cart = $cart->items;
        $totalQty = $cart->totalQty;
        $totalPrice = $cart->totalPrice;

        //dd($cart);

        return view('customer.page.billdetail', compact('cart','product_cart', 'totalQty', 'totalPrice'));
        
    }
    public function postBill(Request $rq){
        $cart = Session::get('cart');

        if(Auth::check()){
            $id_user=Auth::id();
            $user = User::find($id_user);

            $user->name = $rq->name;
            $user->email = $rq->email;
            $user->address = $rq->address;
            $user->phone_number = $rq->phone_number;
            $user->note = $rq->note;
            $user->save();
        }
        
        $bill = new Bill;
        $bill->customer_id = Auth::id();
        $bill->date_order = date('y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->note = $rq->note;
        $bill->payment = $rq->payment;
        $bill->status = $rq->status;
        $bill->save();

        foreach( $cart->items as $key => $value){
            $bill_detail = new BillDetail;
            $bill_detail->bill_id = $bill->id;
            $bill_detail->product_id = $key;
            $bill_detail->quantity = $value['quantity'];
            $bill_detail->price = ($value['price']/$value['quantity']);
            /*$bill_detail->promotion_price = ($value['promotion_price']/$value['quantity']);*/
            $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Mua hàng thành công. Vui lòng kiểm tra email của bạn!');
    }
}
