<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('ad.users.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        return view('admin.users.create');
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'           => $request ->name,
            'email'          => $request ->email,
            'phone_number'   => $request ->phone_number,
            'password'       => $request ->password,
            'address'        => $request ->address,
            'remember_token' => $request ->remember_token,
            'note'           => $request ->note,
            'role'           => $request ->role
            

        ]);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('ad.users.show', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('ad.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $user -> update([
            'name'           => $request ->name,
            'email'          => $request ->email,
            'phone_number'   => $request ->phone_number,
            'address'        => $request ->address,
            'password'       => bcrypt($request ->password),
            'remember_token' => $request ->remember_token,
            'note'           => $request ->note,
            'role'           => $request ->role
        ]);
        return redirect()->route('users.show', $id);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->bills()->delete();

        User::destroy($id);
        return redirect()->route('users.index');
    }

    public function dangki(){
        return view('dangki');
    }

    public function dangnhap(){
        return view('dangnhap');
    }

    public function dangxuat(){
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function postDangki(Request $rq){
        $this->validate($rq,
            [
                'name'         =>'required',
                'email'        =>'required|email|unique:users,email',
                'phone_number' =>'required',
                'address'      =>'required',
                'password'     =>'required|min:5|max:20',
                're_password'  =>'required|same:password'
            ],
            [
                'name.required'         =>'Vui lòng nhập tên của bạn',
                'email.required'        =>'Vui lòng nhập email',
                'email.email'           =>'Email không đúng định dạng',
                'email.unique'          =>'Email này đã có người sử dụng',
                'phone_number.required' =>'Vui lòng nhập số điện thoại của bạn',
                'address.required'      =>'Vui lòng nhập địa chỉ của bạn',
                'password.required'     =>'Vui lòng nhập password',
                'password.min'          =>'Password ít nhất 5 kí tự',
                'password.max'          =>'Password tối đa 20 kí tự',
                're_password.same'      =>'Password không giống nhau'
            ]
            );
            $user               = new User();
            $user->name         = $rq->name;
            $user->email        = $rq->email;
            $user->phone_number = $rq->phone_number;
            $user->address      = $rq->address;
            $user->role         = 'customer';
            //$password         = bcrypt($rq->password);
            $user->password     = bcrypt($rq->password);
            $user->save();

            return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
    }
    public function postDangnhap(Request $request){
        $this->validate($request,
            [
                'email'    => 'required|email',
                'password' => 'required|min:5|max:20'
            ],
            [
                'email.required'    => 'Vui lòng nhập email',
                'email.email'       => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]           
            );
            $email    = $request->email;
            $password = $request->password;
            //dd(bcrypt($password));
            
            if(Auth::attempt(['email' => $email , 'password' => $password, 'role' => "customer"])) {
                return redirect()->route('trangchu');
            }
            else{
                return redirect()->back()->with('thongbao', 'Đăng nhập không thành công');
            }
    }
    public function getadmin(){
        return view('ad.home');
    }


    public function adminLogin(){
        return view('loginadmin');
    }

    public function postAdminlogin(Request $r){
        $this->validate($r,
            [
                'name'     => 'required',
                'password' => 'required|min:5|max:20'
            ],
            [
                'name.required'     => 'Vui lòng nhập tên đăng nhập',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]           
            );
            $name = $r->name;
            $password = $r->password;
            
            
            //dd(bcrypt($password));
            
                if(Auth::attempt(['name' => $name , 'password' => $password, 'role'=>"admin"])) {
                    return redirect()->route('admin');
                }
                else{
                    return redirect()->back()->with('thongbao', 'Đăng nhập không thành công');
                }
            
    }
}
