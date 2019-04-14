<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\ProductType;
use App\Bill;
use App\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;



class CartAjController extends Controller
{
    public function getAddtoCart(Request $request)
    {
        $id       = $request->pro_id;
        $qty      = $request->num ?? 1;
        $quantity = 1;
        $product  = Product::find($id);
        $name     = $product->name;
        $price    = $product->price;
        $image    = $product->image;
        Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => 0, 'options' => ['image' => $image]]);
    	return view('customer.cart.cart');
    }

     public function getShowCart(Request $request)
    {
        $type_home = ProductType::all();
        return view('customer.page.cart', compact('type_home'));
    }

     public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'Item has been removed!');
    }

     public function getShowBill(Request $request)
    {
        $this->data['title'] = 'Check out';
        $this->data['cart']  = Cart::content();
        $this->data['total'] = Cart::total();
        $type_home           = ProductType::all();
        return view('customer.page.bill', $this->data, compact('type_home'));
    }

    public function postCheckOut(Request $request) {
        $cartInfor = Cart::content();
        // validate
        $rule = [
            'name'         => 'required',
            'email'        => 'required|email',
            'address'      => 'required',
            'phone_number' => 'required|digits_between:10,12'

        ];
        
        $validator = Validator::make(Input::all(), $rule);
        
        // if ($validator->fails()) {
        //     return redirect('bills')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        
        try {
            // save
            $customer               = new User;
            $customer->name         = $request->name;
            $customer->email        = $request->email;
            $customer->address      = $request->address;
            $customer->phone_number = $request->phone_number;
            $customer->note         = $request->note;
            $customer->save();

            $bill              = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order  = date('Y-m-d H:i:s');
            $bill->total       = str_replace(',', '', Cart::total());
            $bill->payment     = $request->payment;
            $bill->note        = $request->note;
            $bill->save();

            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail             = new BillDetail;
                    $billDetail->bill_id    = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantity   = $item->qty;
                    $billDetail->price      = $item->price;
                    $billDetail->save();
                }
            }
          // del
           Cart::destroy();
            
        } catch (Exception $e) {
            echo $e->getMessage('Paypal error');
        }

        return redirect()->back()->with('success','Payment success');
    }
}
