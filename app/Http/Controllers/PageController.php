<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\News;
use App\Product;
use App\ProductType;
use App\Slide;
use App\User;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Hash;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    public function getIndex(Request $id){
        $new              = News::all();
        $type_home        = ProductType::all(); //loại sản phẩm
        $new_products     = Product::where('new',1)->get();
        $feature_products = Product::all();
        $name_type        = ProductType::where('id', $id)->get();
        return view('customer.page.home',compact('new','type_home', 'new_products','feature_products','name_type'));
    }

    public function getProductType($type){
        $type_home = ProductType::all(); //loại sản phẩm
        $products  = Product::where('producttype_id', $type)->paginate(8);
        $name_type = ProductType::where('id', $type)->first();
        return view('customer.page.product', compact('type_home','products','name_type'));
    }

    public function getProduct(Request $id){
        $type_home      = ProductType::all();
        $products       = Product::paginate(9);
        return view('customer.page.product',compact('type_home','products'));
    }

    public function getProductDetail(Request $request){
        $type_home       = ProductType::all();
        $detail_product  = Product::where('id', $request->id)->get();
        $detail          = Product::where('id', $request->id)->first();
        $related_product = Product::where('producttype_id',$detail->producttype_id)->get();
        return view('customer.page.productdetail', compact('type_home','detail_product','detail','related_product'));
    }

    public function getContact(){
        $type_home    = ProductType::all(); 
        return view('customer.page.contact', compact('type_home'));
    }
    public function postContact(Request $request)
    {
        $this->validate($request, [
                'name'    => 'required',
                'email'   => 'required|email',
                'message' => 'required'
            ]);

        ContactUS::create($request->all());
        return back()->with('success', 'Thanks for contacting us!');
    }

    public function getAbout(){
        $type_home = ProductType::all();
    	return view('customer.page.about', compact('type_home'));
    }

    public function getBlog(Request $id){
        $new       = News::all();
        $type_home = ProductType::all();
        $news      = News::where('id',$id)->get();

    	return view('customer.page.blog',compact('new','type_home','news'));
    }

    public function getBlogSingle($id){
        $news           = News::where('id',$id)->get();
        $detail_product = Product::where('id', $id)->get();
        $products       = Product::all();
        $type_home      = ProductType::all();
    	return view('customer.page.blogdetail',compact('news','detail_product','products','type_home'));
    }

    public function getAdmin(){
        return view('ad.homepage');
    }

   
    public function getShowAdmin(){
        return view('admin.homepage');
    }

    public function getSearch(Request $req ){
        $type_home = ProductType::all();
        $product   = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('price',$req->key)->get();
        return view('customer.page.search', compact('type_home','product'));
    }

    public function getLogin(){
        $type_home = ProductType::all();
        return view('customer.page.login',compact('type_home'));
    }

    public function getRegister(){
        $type_home = ProductType::all();
        return view('customer.page.register',compact('type_home'));
    }

    public function postRegister(Request $request){
        $type_home = ProductType::all();
        $this->validate($request,
        [
            'name'         => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required',
            'address'      => 'required',
            'password'     => 'required|min:6|max:20',
            'confirm'      => 'required|same:password'
        ],
        [
            'email.required'    => 'Vui lòng nhập email',
            'email.email'       => 'Không đúng định dạng email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'confirm.same'      => 'Mật khẩu không giống nhau',
            'password.min'      => 'Mật khẩu ít nhất 6 kí tự',
            'password.max'      => 'Mật khẩu tối đa 20 kí tự'
        ]);

        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address      = $request->address;
        $user->password     = Hash::make($request->password);
        $user->role         = 'customer';
        $user->save();

        return redirect()->back()->with('success','Register successfully');
    }

    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email'    =>'required|email',
                'password' =>'required|min:6|max:20'
            ],
            [
                'email.required'    =>'Vui lòng nhập email',
                'email.email'       =>'Email không đúng định dạng',
                'password.required' =>'Vui lòng nhập password',
                'password.min'      =>'Vui lòng nhập ít nhất 6 kí tự',
                'password.max'      =>'Mật khẩu tối đa 20 kí tự'
            ]
            );
            $credentials = array('email'=>$request->email,'password'=>$request->password);
            if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password, 'role' => "customer"])) {
                return redirect('/');
            }
            elseif (Auth::attempt(['email'=>$request->email , 'password'=>$request->password, 'role'=>"admin"])) {
                return redirect('ad');
            }
            if (Auth::attempt($credentials)) {
                return redirect()->back()->with(['flag'=>'success','message'=>'Login successfully']);
            }else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Login error']);
            }
    }

}
